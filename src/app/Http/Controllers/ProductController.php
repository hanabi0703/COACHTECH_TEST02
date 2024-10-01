<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function index(){
        // $products = Product::Paginate(7);
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $products = Product::KeywordSearch($request->keyword)->Paginate(7)->withQueryString();
        return view('products', compact('products'));
    }

    public function edit(Request $request){
        $product = Product::find($request->id);
        // $season = Product::seasons();
        $seasons = Season::all();
        return view('edit', compact('product', 'seasons'));
    }

    public function update(Request $request)
    {
        $form = $request->all();
        // $form = [
        //     'name' => $request -> name,
        //     'price' => $request -> price,
        //     'image' => $request -> image,
        //     'description' => $request -> description,
        // ]
        // $season_ids = [1, 2, 3];
        unset($form['_token']);
        Log::debug($form);
        Product::find($request->id)->update($form);
        Product::find($request->id)->seasons()->sync($request->season_ids);
        return redirect('/');
    }

        public function delete(Request $request)
    {
        Log::debug($request->id);
        Product::find($request->id)->delete();
        return redirect('/');
    }

}

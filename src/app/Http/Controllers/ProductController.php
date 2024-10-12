<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\AddRequest;


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
        $seasons = Season::all();
        return view('edit', compact('product', 'seasons'));
    }

    public function update(AddRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        if($request->image){
        $image_path = $request->file('image')->store('public/images');
        $form['image'] = basename($image_path);
        }
        Product::find($request->id)->update($form);
        Product::find($request->id)->seasons()->sync($request->season_ids);
        return redirect('/');
    }

    public function add(Request $request)
    {
        $seasons = Season::all();
        return view('add', compact('seasons'));
    }

    public function register(AddRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        // Log::debug($request);
        if($request->image){
        $image_path = $request->file('image')->store('public/images');
        $form['image'] = basename($image_path);
        }
        $product = Product::create($form);
        $product->seasons()->sync($request->season_ids);
        // Log::debug($request);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        $product->seasons()->detach();
        Product::find($request->id)->delete();
        return redirect('/');
    }

}

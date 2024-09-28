<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        return view('edit', compact('product'));
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Product::find($request->id)->update($form);
        return redirect('products');
    }
}

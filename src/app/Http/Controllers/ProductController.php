<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::Paginate(7);
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $products = Product::KeywordSearch($request->keyword)->Paginate(7)->withQueryString();
        // $categories = Category::all();

        return view('products', compact('products'));
    }
}

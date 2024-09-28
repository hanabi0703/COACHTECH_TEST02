<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $contacts = Product::Paginate(7);
        $products = Product::all();
        return view('products', ['products' => $products]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
            return view('frontend.index',compact('products'));    
    }
    public function singleProduct(Product $product){
        return view('frontend.single-product',compact('product'));
    }
}

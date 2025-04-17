<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
     
      $relacionados = Product::where('status', 2)
        ->where('subcategory_id', $product->subcategory_id)
        ->where('id', '!=', $product->id)
        ->orderBy('id', 'desc')
        ->take(10)
        ->get();
       
      return view('products.show',compact('product','relacionados'));
    }
}

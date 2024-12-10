<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Product;
use App\Models\ProductMaterial;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response($products,200);
    }

    public function createProduct(Request $request){
        $validated = $request->validate([
            'name'=>'required|string',
            'code'=>'required|string|unique:products'
        ]);
        $product = Product::create($validated);

        return response()->json([$product,201]);
    }




}

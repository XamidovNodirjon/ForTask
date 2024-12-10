<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductMaterial;
use Illuminate\Http\Request;

class ProductMaterialController extends Controller
{
    public function index(){
        $product_materials = ProductMaterial::all();
        return response($product_materials,200);
    }

    public function createProductMaterial(Request $request){
        $validated = $request->validate([
            'product_id'=>'required|exists:products,id',
            'material_id'=>'required|exists:materials,id',
            'quantity'=>'required|integer'
        ]);

        $productMaterial = ProductMaterial::create($validated);

        return response()->json([$productMaterial,201]);
    }
}

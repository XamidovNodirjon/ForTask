<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(){
        $materials = Material::all();
        return response($materials,200);
    }

    public function createMaterial(Request $request){
        $validated = $request->validate([
            'name'=>'required|string'
        ]);

        $material = Material::create($validated);

        return response()->json([$material,201]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(){
        $warehouse = Warehouse::all();
        return response($warehouse,200);
    }

    public function createWarehouse(Request $request)
    {
        $validated = $request->validate([
            'material_id' => 'required|exists:materials,id',
            'remainder' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $warehouse = Warehouse::create($validated);

        return response()->json($warehouse, 201);
    }
}

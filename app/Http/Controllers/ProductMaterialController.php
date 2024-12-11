<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Product;
use App\Models\ProductMaterial;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductMaterialController extends Controller
{
    public function index(){
        $product_materials = ProductMaterial::all();
        return response($product_materials,200);
    }

    public function calculateMaterials(Request $request)
    {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.name' => 'required|string',
            'products.*.quantity' => 'required|integer',
            'products.*.materials' => 'required|array',
            'products.*.materials.*.material_id' => 'required|integer',
            'products.*.materials.*.quantity' => 'required|numeric',
        ]);

        $result = [];

        foreach ($validated['products'] as $productDetails) {
            $productName = $productDetails['name'];
            $productQuantity = $productDetails['quantity'];
            $materialDetails = $productDetails['materials'];

            $product = Product::where('name', $productName)->first();

            $neededMaterials = [];
            foreach ($materialDetails as $materialDetail) {
                $material = Material::find($materialDetail['material_id']);
                $quantityRequired = $materialDetail['quantity'] * $productQuantity;

                $warehouses = Warehouse::where('material_id', $material->id)
                    ->orderBy('created_at')
                    ->get();

                $totalTaken = 0;
                $warehouseData = [];
                foreach ($warehouses as $warehouse) {
                    $availableQuantity = min($warehouse->remainder, $quantityRequired - $totalTaken);
                    if ($availableQuantity > 0) {
                        $totalTaken += $availableQuantity;
                        $warehouseData[] = [
                            'warehouse_id' => $warehouse->id,
                            'material_name' => $material->name,
                            'qty' => $availableQuantity,
                            'price' => $warehouse->price,
                        ];
                    }

                    ProductMaterial::create([
                        'product_id' => $product->id,
                        'material_id' => $material->id,
                        'warehouse_id' => $warehouse->id,
                        'quantity' => $availableQuantity,
                        'price' => $warehouse->price,
                    ]);

                    if ($totalTaken >= $quantityRequired) {
                        break;
                    }
                }

                if ($totalTaken < $quantityRequired) {
                    $warehouseData[] = [
                        'warehouse_id' => null,
                        'material_name' => $material->name,
                        'qty' => $quantityRequired - $totalTaken,
                        'price' => null
                    ];
                }

                $neededMaterials[] = $warehouseData;
            }

            $result[] = [
                'product_name' => $productName,
                'product_qty' => $productQuantity,
                'product_materials' => $neededMaterials
            ];
        }

        return response()->json(['result' => $result]);
    }


}

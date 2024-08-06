<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cate_id' => 'required|exists:categories,_id',
            'name' => 'required|string|max:255',
            // Añadir otras validaciones necesarias
        ]);

        $product = Product::create($validatedData);
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product, 200);
        }
        return response()->json(['error' => 'Product not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Añadir otras validaciones necesarias
        ]);

        $category = Category::create($validatedData);
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json($category, 200);
        }
        return response()->json(['error' => 'Category not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return response()->json(Cart::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,_id',
            'prod_id' => 'required|exists:products,_id',
            'prod_qty' => 'required|integer',
        ]);

        $cart = Cart::create($validatedData);
        return response()->json($cart, 201);
    }

    public function show($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            return response()->json($cart, 200);
        }
        return response()->json(['error' => 'Cart not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());
        return response()->json($cart, 200);
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return response()->json(null, 204);
    }
}

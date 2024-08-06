<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,_id',
            'total_price' => 'required|numeric',
            // Añadir otras validaciones necesarias
        ]);

        $order = Order::create($validatedData);
        return response()->json($order, 201);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if ($order) {
            return response()->json($order, 200);
        }
        return response()->json(['error' => 'Order not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order, 200);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return response()->json(Item::all());
    }

    
public function store(Request $request)
    {
        $item = Item::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        return response()->json($item);
    }

    public function show(string $id)
    {
        return response()->json(
            Item::findOrFail($id)
        );
    }

    public function update(Request $request, string $id)
    {
        $item = Item::findOrFail($id);

        $item->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return response()->json($item);
    }

    public function destroy(string $id)
    {
        Item::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Item deleted'
        ]);
    }
}
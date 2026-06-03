<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        return response()->json(
            $this->itemService->getAll()
        );
    }

    public function store(StoreItemRequest $request)
    {
        return response()->json(
            $this->itemService->create([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'category_id' => $request->category_id
            ])
        );
    }

    public function show(string $id)
    {
        return response()->json(
            $this->itemService->findById($id)
        );
    }

    public function update(UpdateItemRequest $request, string $id)
    {
        return response()->json(
            $this->itemService->update($id, [
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'category_id' => $request->category_id
            ])
        );
    }

    public function destroy(string $id)
    {
        $this->itemService->delete($id);

        return response()->json([
            'message' => 'Item deleted'
        ]);
    }
}
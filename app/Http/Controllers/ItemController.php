<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ItemController extends BaseController
{
    public function index(Request $request)
    {
        $query = Item::with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        return $this->success($query->get());
    }

    public function store(StoreItemRequest $request)
    {
        
        $item = Item::create($request->validated());

        Log::info('Item created', [
            'id' => $item->id,
            'name' => $item->name
        ]);

        return $this->success(
            $item,
            'Item berhasil dibuat',
            201
        );
    }

    public function show($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return $this->error(
                'Item tidak ditemukan',
                404
            );
        }

        return $this->success(
            $item,
            'Detail item berhasil ditampilkan'
        );
    }

    public function update(UpdateItemRequest $request, $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return $this->error(
                'Item tidak ditemukan',
                404
            );
        }

        $item->update($request->validated());

        Log::info('Item updated', [
            'id' => $item->id
        ]);

        return $this->success(
            $item,
            'Item berhasil diperbarui'
        );
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return $this->error(
                'Item tidak ditemukan',
                404
            );
        }

        Log::info('Item deleted', [
            'id' => $item->id
        ]);

        $item->delete();

        return $this->success(
            null,
            'Item berhasil dihapus'
        );
    }
}
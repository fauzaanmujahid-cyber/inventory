<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Support\Facades\Log;

class ItemService
{
    public function create(array $data)
    {
        $item = Item::create($data);

        Log::info('Item created', [
            'id' => $item->id,
            'data' => $data
        ]);

        return $item;
    }

    public function update(Item $item, array $data)
    {
        $item->update($data);

        Log::info('Item updated', [
            'id' => $item->id,
            'changes' => $data
        ]);

        return $item;
    }

    public function delete(Item $item)
    {
        Log::info('Item deleted', [
            'id' => $item->id
        ]);

        return $item->delete();
    }
}
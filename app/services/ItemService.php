<?php

namespace App\Services;

use App\Models\Item;

class ItemService
{
    public function getAll()
    {
        return Item::all();
    }

    public function create(array $data)
    {
        return Item::create($data);
    }

    public function findById($id)
    {
        return Item::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $item = Item::findOrFail($id);
        $item->update($data);

        return $item;
    }

    public function delete($id)
    {
        return Item::findOrFail($id)->delete();
    }
}
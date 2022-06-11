<?php

namespace App\Repositories;

use App\Models\Item;
use App\Repositories\Contracts\ItemRepositoryContract;

class ItemRepository implements ItemRepositoryContract
{
    public function create($data)
    {
        return Item::create($data);
    }

    public function update($request, Item $item)
    {
        $item->update($request);
        return $item;
    }

    public function delete(Item $item)
    {
        return $item->delete();
    }
}

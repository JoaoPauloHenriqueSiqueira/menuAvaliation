<?php

namespace App\Repositories;

use App\Models\Itens;
use App\Repositories\Contracts\ItemRepositoryContract;

class ItemRepository implements ItemRepositoryContract
{
    public function create($data)
    {
        return Itens::create($data);
    }

    public function update($request, Itens $item)
    {
        $item->update($request);
        return $item;
    }
}

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

}

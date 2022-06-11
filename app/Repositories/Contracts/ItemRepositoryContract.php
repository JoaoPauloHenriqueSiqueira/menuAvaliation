<?php

namespace App\Repositories\Contracts;

use App\Models\Item;

interface ItemRepositoryContract
{
    public function create($data);

    public function update($request, Item $data);

    public function delete(Item $data);


}

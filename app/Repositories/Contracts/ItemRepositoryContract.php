<?php

namespace App\Repositories\Contracts;

use App\Models\Itens;

interface ItemRepositoryContract
{
    public function create($data);

    public function update($request, Itens $data);

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemPostRequest;
use App\Models\Company;
use App\Models\Itens;
use App\Repositories\Contracts\ItemRepositoryContract;

class ItemController extends Controller
{
    protected $repository;

    public function __construct(ItemRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function store(ItemPostRequest $request)
    {
        $item = $this->repository->create($request->validated());
        return redirect('/item/' . $item->id);
    }

    public function update(Itens $item)
    {
        $item = $this->repository->update(request()->all(), $item);
        return redirect('/item/' . $item->id);
    }


}

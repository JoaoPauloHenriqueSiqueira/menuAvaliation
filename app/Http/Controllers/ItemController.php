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
        $validated = $request->validated();
        $item = $this->repository->create($validated);
        return redirect('/item/' . $item->id);
    }

}

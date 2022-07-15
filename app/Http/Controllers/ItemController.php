<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemPostRequest;
use App\Models\Company;
use App\Models\Item;
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

        $file = $request->file('image');

        $companyId = Auth::user()->company_id;
        $path = "image/company/$companyId/item/$item->id";

        if($file){
            $pathPhoto = $this->uploadPlugin->upload($item, $path);
        }

        return redirect('/item/' . $item->id);
    }

    public function update(Item $item)
    {
        $item = $this->repository->update(request()->all(), $item);
        return redirect('/item/' . $item->id);
    }

    public function destroy(Item $item)
    {
        try {
            $this->validOwner($item);
            $this->repository->delete($item);
            return redirect('/items');
        } catch (\Exception $e) {
            return response([], 404);
        }
    }

    private function validOwner(Item $item)
    {
        if ($item->company_id != auth()->user()->company_id) {
            throw new \Exception();
        }
    }


}

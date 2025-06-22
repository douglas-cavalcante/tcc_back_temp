<?php

namespace App\Http\Repositories;

use App\Interfaces\StoreRepositoryInterface;
use App\Models\Store;

class StoreRepository implements StoreRepositoryInterface
{

    public function all()
    {
        return Store::all();
    }

    public function store($data)
    {
        return Store::create($data);
    }

    public function find($id)
    {
        return Store::findOrFail($id);
    }

    public function update($data, $id)
    {
        return Store::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        Store::destroy($id);
    }
}

?>

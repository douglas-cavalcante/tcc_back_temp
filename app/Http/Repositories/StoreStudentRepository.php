<?php

namespace App\Http\Repositories;

use App\Interfaces\StoreStudentRepositoryInterface;
use App\Models\StoreStudent;

class StoreStudentRepository implements StoreStudentRepositoryInterface
{

    public function all()
    {
        return StoreStudent::all();
    }

    public function store($data)
    {
        return StoreStudent::create($data);
    }

    public function find($id)
    {
        return StoreStudent::findOrFail($id);
    }

    public function update($data, $id)
    {
        return StoreStudent::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        StoreStudent::destroy($id);
    }
}

?>

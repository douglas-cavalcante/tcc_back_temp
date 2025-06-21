<?php

namespace App\Http\Repositories;

use App\Interfaces\TeacherRepositoryInterface;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface
{

    public function all()
    {
        return Teacher::all();
    }

    public function store($data)
    {
        return Teacher::create($data);
    }

    public function find($id)
    {
        return Teacher::findOrFail($id);
    }

    public function update($data, $id)
    {
        return Teacher::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        Teacher::destroy($id);
    }
}

?>

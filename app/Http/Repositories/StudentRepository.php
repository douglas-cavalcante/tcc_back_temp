<?php

namespace App\Http\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{

    public function all()
    {
        return Student::all();
    }

    public function store($data)
    {
        return Student::create($data);
    }

    public function find($id)
    {
        return Student::findOrFail($id);
    }

    public function update($data, $id)
    {
        return Student::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        Student::destroy($id);
    }
}

?>

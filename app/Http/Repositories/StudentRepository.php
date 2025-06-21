<?php

namespace App\Http\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Subject;

class StudentRepository implements StudentRepositoryInterface
{

    public function all()
    {
        return Subject::all();
    }

    public function store($data)
    {
        return Subject::create($data);
    }

    public function find($id)
    {
        return Subject::findOrFail($id);
    }

    public function update($data, $id)
    {
        $subject = Subject::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        Subject::destroy($id);
    }
}

?>

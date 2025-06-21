<?php

namespace App\Http\Repositories;

use App\Interfaces\SubjectRepositoryInterface;
use App\Models\Subject;

class SubjectRepository implements SubjectRepositoryInterface
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

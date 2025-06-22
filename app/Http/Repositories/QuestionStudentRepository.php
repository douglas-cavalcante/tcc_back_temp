<?php

namespace App\Http\Repositories;

use App\Interfaces\QuestionStudentRepositoryInterface;
use App\Models\QuestionStudent;

class QuestionStudentRepository implements QuestionStudentRepositoryInterface
{

    public function all()
    {
        return QuestionStudent::all();
    }

    public function store($data)
    {
        return QuestionStudent::create($data);
    }

    public function find($id)
    {
        return QuestionStudent::findOrFail($id);
    }

    public function update($data, $id)
    {
        return QuestionStudent::whereId($id)->update($data);
    }

    public function destroy($id)
    {
        QuestionStudent::destroy($id);
    }
}

?>

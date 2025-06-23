<?php

namespace App\Http\Repositories;

use App\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;
use App\Models\Subject;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function all()
    {
        return Question::all();
    }

    public function allBySubjectId($id)
    {
        return Subject::whereId($id)->questions;
    }

    public function store($data)
    {
        return Question::create($data);
    }

    public function find($id)
    {
        return Question::findOrFail($id);
    }

    public function update($data, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($data);
        return $question;
    }

    public function destroy($id)
    {
        Question::destroy($id);
    }
}

?>

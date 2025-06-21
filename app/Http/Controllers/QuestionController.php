<?php

namespace App\Http\Controllers;

use App\Http\Repositories\QuestionRepository;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private QuestionRepository $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function all()
    {
        return $this->questionRepository->all();
    }

    public function find($id)
    {
        return $this->questionRepository->find($id);
    }

        public function findAllBySubjectId($id)
    {
        return $this->questionRepository->find($id);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $request->validate([
                'name' => 'string|required',
                'description' => 'string|required',
                'item_a' => 'string|required',
                'item_b' => 'string|required',
                'item_c' => 'string|required',
                'item_d' => 'string|required',
                'item_e' => 'string',
                'correct_item' => 'string|required',
            ]);

            return $this->questionRepository->store($data);

        } catch(Exception $exception) {
            return $this->error($exception->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = [
                'description' => $request->name,
                'item_a' => $request->item_a,
                'item_b' => $request->item_b,
                'item_c' => $request->item_c,
                'item_d' => $request->item_d,
                'item_e' => $request->item_e,
                'correct_item' => $request->correct_item,
                'subject_id' => $request->subject_id,
                'amount' => $request->amount
            ];

            return $this->questionRepository->update($data, $id);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $this->questionRepository->destroy($id);
        return response()->json('Disciplina deletada com sucesso', 204);
    }
}


<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Repositories\SubjectRepository;


class SubjectController extends Controller
{
    private SubjectRepository $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function all()
    {
        return $this->subjectRepository->all();
    }

    public function find($id)
    {
        return $this->subjectRepository->find($id);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $request->validate([
                'name' => 'string|required'
            ]);

            $subject = $this->subjectRepository->store($data);

            return $subject;
        } catch(Exception $exception) {
            return $this->error($exception->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = [
                'name' => $request->name
            ];

            return $this->subjectRepository->update($data, $id);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $this->subjectRepository->destroy($id);
        return response()->json('Disciplina deletada com sucesso', 204);
    }
}

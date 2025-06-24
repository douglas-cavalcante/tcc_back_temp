<?php

namespace App\Http\Controllers;

use App\Http\Repositories\QuestionRepository;
use App\Http\Repositories\QuestionStudentRepository;
use App\Http\Repositories\StudentRepository;
use App\Http\Repositories\StudentWalletRepository;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private QuestionRepository $questionRepository;
    private StudentRepository $studentRepository;
    private QuestionStudentRepository $questionStudentRepository;
    private StudentWalletRepository $studentWalletRepository;

    public function __construct(
        QuestionRepository $questionRepository,
        StudentRepository $studentRepository,
        QuestionStudentRepository $questionStudentRepository,
        StudentWalletRepository $studentWalletRepository
    )
    {
        $this->questionRepository = $questionRepository;
        $this->studentRepository = $studentRepository;
        $this->questionStudentRepository = $questionStudentRepository;
        $this->studentWalletRepository = $studentWalletRepository;
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
                'description' => 'string|required',
                'topic'=> 'string|required',
                'item_a' => 'string|required',
                'item_b' => 'string|required',
                'item_c' => 'string|required',
                'item_d' => 'string|required',
                'item_e' => 'string',
                'correct_item' => 'string|required',
                'explanation_correct'=> 'string|required',
                'explanation_incorrect'=> 'string|required'
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
                'description' => $request->description,
                'topic'=> $request->topic,
                'item_a' => $request->item_a,
                'item_b' => $request->item_b,
                'item_c' => $request->item_c,
                'item_d' => $request->item_d,
                'item_e' => $request->item_e,
                'correct_item' => $request->correct_item,
                'explanation_correct'=> $request->explanation_correct,
                'explation_incorrect'=> $request->explanation_incorrect,
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

    public function answerQuestion(Request $request)
    {
        try {
            $question = $this->questionRepository->find($request->question_id);
            $is_correct = $question->correct_item == $request->answer;

            $data = [
                'student_id' => $request->student_id,
                'question_id' => $request->question_id,
                'is_correct' => $is_correct,
            ];

            $questionStudent = $this->questionStudentRepository->store($data);
            
            $wallet_description = sprintf('%s de %01.2f por %s a questão',
        $is_correct ? 'Deposito':'Saque',
                $is_correct ? 'acertar':'errar'
            );
            $data = [
                'student_id' => $request->student_id,
                'amount' => $is_correct ? $question->amount : 10.0,
                'type' => $is_correct ? 'DEPOSIT':'WITHDRAW',
                'description'=> $wallet_description,
            ];
            
            $studentWallet = $this->studentWalletRepository->store($data);
            
            return response()->json([$questionStudent, $studentWallet], 200);
        } catch(Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }
}


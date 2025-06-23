<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\StudentRepository;
use App\Http\Repositories\TeacherRepository;
use App\Mail\SendEmailNewPassword;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private TeacherRepository $teacherRepository;
    private StudentRepository $studentRepository;

    public function __construct(
        TeacherRepository $teacherRepository,
        StudentRepository $studentRepository
    )
    {
        $this->teacherRepository = $teacherRepository;
        $this->studentRepository = $studentRepository;
    }
    
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $request->validate([
                'name' => 'string|required',
                'email' => 'string|required|unique:users',
                'password' => 'string|required|min:8|max:32'
            ]);

            $user = User::create($data);

            if($data['role'] == 'TEACHER') {
                $this->teacherRepository->store([...$data, 'user_id' => $user->id]);
            } else if($data['role'] == 'STUDENT') { 
                $this->studentRepository->store([...$data, 'user_id' => $user->id]);
            }

            return $user;
        } catch (Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }



    public function update(Request $request)
    {

        function generateRandomPassword($length = 8)
        {
            $bytes = random_bytes($length / 2);
            $password = bin2hex($bytes);
            return $password;
        }

        try {
            $data = $request->only('email');

            $user = User::where('email',  $data['email'])->first();

            if (!$user) return $this->json();

            //$newPassord = generateRandomPassword(8);

            $newPassord = "12345678";

            $user->update([
                'password' => $newPassord
            ]);

            Mail::to($user->email, $user->name)
                ->send(new SendEmailNewPassword($user->name, $newPassord));

            return $newPassord;
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }


    public function newPassword($id, Request $request)
    {

        try {

            $user = User::find($id);

            if (!$user) return $this->error('dado nao encontrado', Response::HTTP_BAD_REQUEST);

            $request->validate([
                'password' => [
                    'min:8',
                    'max:32',
                ]
            ]);

            $user->update($request->all());

            return $user;
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }


    public function recoveryPassword(Request $request)
    {
        try {
            $body = $request->only('email');


            $user = User::where('email', $body['email'])->first();



            if (!$user) return $this->error('dado nao encontrado', Response::HTTP_BAD_REQUEST);

            $originalPassword = Str::password(8, true, true, false, false);

            $user->update([
                'password' => $originalPassword
            ]);


            Mail::to($user->email, $user->name)
                ->send(new SendEmailNewPassword($user->name, $originalPassword));
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 400);
        }
    }
}

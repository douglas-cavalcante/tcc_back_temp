<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use Exception;

class AuthController extends Controller
{

    public function store(Request $request)
    {
        try {
            $data = $request->only('email', 'password');

            $request->validate([
                'email' => 'string|required',
                'password' => 'string|required'
            ]);

            $authenticated = Auth::attempt($data);

            if (!$authenticated) {
                return $this->error('Não autorizado. Credenciais incorretas', Response::HTTP_UNAUTHORIZED);
            }

            $request->user()->tokens()->delete();

            $name = $request->user()->name;

            $token = $request->user()->createToken('simple');

            //$profile = Role::find($request->user()->role_id);

            return $this->response('Autorizado', 200, [
                'name' => $name,
                'token' => $token->plainTextToken,
                //'role' => $profile->name

            ]);

        } catch (Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->response('', Response::HTTP_NO_CONTENT);
    }
}

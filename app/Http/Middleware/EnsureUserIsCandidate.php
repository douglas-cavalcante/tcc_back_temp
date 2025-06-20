<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsCandidate
{

    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Obtém o usuário autenticado
            $user = Auth::user();

            // Verifica se o role do usuário é CANDIDATE
            if ($user->role_id === 3) {
                // Permite que a requisição prossiga
                return $next($request);
            }
        }

        // Se o usuário não for autenticado ou não tiver o role CANDIDATE, retorna uma resposta de erro
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}

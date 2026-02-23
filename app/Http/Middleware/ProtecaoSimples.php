<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log; // Importante para o Log

class ProtecaoSimples
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Acesso à rota: ' . $request->url());

        if ($request->has('bloqueado')) {
            return redirect('/home')->with('msg', 'Acesso negado pelo Middleware!');
        }

        return $next($request);
    }
}

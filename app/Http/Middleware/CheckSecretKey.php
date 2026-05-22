<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSecretKey
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->header('X-SUPER-SECRET-KEY');
        // $key = $request->header('X-SUPER-SECRET-KEY') ?? $request->query('key'); //testowanie middleware w przeglądarce http://127.0.0.1:8000/banned?key='key'

        if (!$key) {
            return response()->json(['message' => 'Brak klucza'], 401);
        }

        if ($key !== env('SUPER_SECRET_KEY')) {
            return response()->json(['message' => 'Niepoprawny klucz'], 403);
        }

        return $next($request);
    }
}

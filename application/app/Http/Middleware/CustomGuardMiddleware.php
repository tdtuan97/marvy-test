<?php

namespace App\Http\Middleware;

use App\Http\Resources\BaseResource;
use Closure;
use Illuminate\Http\Request;

class CustomGuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Custom token flow rule internal.
        $token = $request->header('X-Token');
        if ($token === 'fPzcnjy9fKq+5SzH9nvuvveDN9S25SweH2XkeVVINTU=') {
            return $next($request);
        }

        return (new BaseResource(CODE_UNAUTHENTICATED))->response()->setStatusCode(401);
    }
}

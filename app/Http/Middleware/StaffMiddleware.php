<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {

        if (! in_array(auth()->user()->role, ['staff', 'admin'])) {

            abort(403);

        }

        return $next($request);
    }
}

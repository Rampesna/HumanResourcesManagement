<?php

namespace App\Http\Middleware\User;

use App\Core\HttpResponse;
use Closure;
use Illuminate\Http\Request;

class CheckSuspend
{
    use HttpResponse;

    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->suspend == 1) {
            return $this->httpResponse('User is suspended', 403);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{

    public function handle(Request $request, Closure $next)
    {
        if (App::environment(['production']) && $request->header('X-Forwarded-Proto') !== 'https') {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }

}

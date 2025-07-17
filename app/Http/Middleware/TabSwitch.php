<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class TabSwitch
{
    public function handle($request, Closure $next)
    {
        // storage/framework/kill.switch acts as our flag
        if (File::exists(storage_path('framework/kill.switch'))) {
            abort(503, 'Service temporarily unavailable');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceFrontendHttps
{
    public function handle(Request $request, Closure $next): Response
    {
        $secureHosts = [
            'gemnah.online',
            'www.gemnah.online',
        ];

        if (in_array($request->getHost(), $secureHosts, true) && ! $request->isSecure()) {
            return redirect('https://'.$request->getHttpHost().$request->getRequestUri(), 301);
        }

        return $next($request);
    }
}

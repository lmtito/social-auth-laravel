<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SocialProfile;

class RedirectIfSocialNetworkNotSupported
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->route('socialNetwork'));
        if (collect(SocialProfile::$allowed)->contains($request->route('socialNetwork'))) {
            return $next($request);
        }
        return redirect()->route('login')->with('warning', "No es posible autenticarte con {$request->route('socialNetwork')}.");
    }
}

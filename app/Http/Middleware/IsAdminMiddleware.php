<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
       
       if (!Auth::check() || !Auth::user()->is_admin) {
        
        return response()->json(['message' => 'You are not authorized to access this page.'], 403);
        // return redirect('home')->with('error','You have not admin access');
       }

       return $next($request);
        
    }
}

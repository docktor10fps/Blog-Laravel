<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth; 

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         /** @var \App\Models\User */
         $user = Auth::user();
         if (Auth::check() && $user->roles()->where('name', 'Admin')->exists()) {
            return $next($request);
        }

        // Якщо користувач не адміністратор, перенаправляємо його або повертаємо помилку
        return redirect('/'); // або return response('Unauthorized.', 403);
    }
}

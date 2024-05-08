<?php

namespace App\Http\Middleware;


use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RegularUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
         
         $current_user = Auth::user();

         
         $userId = $request->route('user');
 
         
         $user = User::findOrFail($userId);
 
         if ($current_user->id !== $user->id) {

             // If the current user is not the same as the requested user, return a 403 Forbidden response
             return response('You are not allowed to access this route. This is another user route.', 403);
         }
 
         
         return $next($request);

    }
}

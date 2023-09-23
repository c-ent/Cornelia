<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Http\RedirectResponse; //!added

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     //!Added this function
    public function handle(Request $request, Closure $next,$userType): Response
    {
        if (!auth()->check() || auth()->user()->role->name !== $userType) {
            abort(403, 'Unauthorized');
        }
        return $next($request);

        // if(auth()->user()->type == $userType){
        //     return $next($request);
        // }
          
        // return response()->json(['You do not have permission to access for this page.']);
        // /* return response()->view('errors.check-permission'); */
    }


    


    
 
}

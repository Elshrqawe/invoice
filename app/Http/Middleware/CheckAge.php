<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $degree = User::select('Status');
        if (Auth::User()->Status == 'مفعل'){

            return view('home');

        }
        else {
            echo "انت غير مفعل";
        }
    }
}

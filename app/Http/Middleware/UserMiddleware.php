<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserMiddleware
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
        // user banned and unbanned
        if(Auth::check() && Auth::user()->isban){
          $banned = Auth::user()->isban == '1';
          Auth::logout();
          if($banned == 1){
            $message = "Your Account has been Banned. Please contact with Admin";
          }
          return redirect()->route('login')->with('status',$message)->withErrors([
            'banned' => 'Your Account has been banned. Please contact with Administrator'
          ]);
        }

        // user active inactive
        if(Auth::check()){
            $expireTime = Carbon::now()->addSeconds(30);
            Cache::put('user-is-online'.Auth::user()->id, true, $expireTime);
            User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }


        if(Auth::check() && Auth::user()->role_id == 2){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}

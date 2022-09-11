<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
Use App\Models\User;

class IsApiUser
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
    if($request->has('access_token'))
    {
        if($request->access_token !== null)
            {
            $user=User::where('access_token', $request->access_token)->first();
                    if($user !== null)
                        {
                            return $next($request);
                        }
                        else {return response()->json(" token is not correct");}
            }
            else { return response()->json("access token is empty");}
    } else { return response()->json("not access token"); }

    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\key;

class AuthKey
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

        $token = $request->query('API_KEY');

        $result = key::where('key', '=', $token)->get();

        if(count($result) == 0) {

            return response()->json(["status" => "WRONG API KEY"], 401);
        }

        return $next($request);
    }


}

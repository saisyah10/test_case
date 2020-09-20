<?php

namespace App\Http\Middleware;
use Firebase\JWT\JWT;
use App\Http\Middleware\Exception;
use App\Http\Middleware\split;

use Closure;

class AccountCheck
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
        try{
            $header = $request->header('Authorization');
            $token = explode(' ',$header);
            // dd($token[1]);
            $key = "example_key";
            $decoded = JWT::decode($token[1], $key, array('HS256'));
            // dd($decoded);
            
        }
        catch(\Exception $e){
            $res['message'] = "Unauthorized!";
            return response()->json($res, 401);
        }
        return $next($request);
    }
}

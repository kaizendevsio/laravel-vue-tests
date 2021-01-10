<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Contracts\Auth\Factory as Auth;
use Auth;

class Authenticate
{
	/**
	 * The authentication guard factory instance.
	 *
	 * @var \Illuminate\Contracts\Auth\Factory
	 */
	protected $auth;

	/**
	 * Create a new middleware instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Factory  $auth
	 * @return void
	 */
	public function __construct(Auth $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{

        //if ($this->auth->guard($guard)->guest()) {
        //    $response = [
        //       'status' => 'UNAUTHORIZED'
        //    ];
        //    return response()->json($response)->setStatusCode(401);
        //}

        //return $next($request);


        if(Auth::check()){
	        return $next($request);
	    }else{
	        $response = [
               'status' => 'UNAUTHORIZED'
            ];
            return response()->json($response)->setStatusCode(401);
	    }
	}
}

<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Validator;
use Closure;

class Registration
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
        $validator = Validator::make($request->all(), [
         'Name' => 'required|string|string|max:255',
         'Email' => 'required|string|email|max:255',
         'Username' => 'required|string|min:6',
         'PasswordString' => 'required|string|min:6',
         ]);

        if ($validator->fails())
        {
            $response = [
              'status' => 'Input Required Fields',
              'errors'=> $validator->errors()->all()
            ];
            return response($response, 422);
        }
        return $next($request);
    }
}

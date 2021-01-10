<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Validator;
use Closure;

class UserDelete
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
         'Id' => 'required|int'
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

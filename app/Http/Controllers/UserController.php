<?php

/**
 * UserController short summary.
 *
 * UserController description.
 *
 * @version 1.0
 * @author Xeon
 */

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Database\QueryException;

class UserController extends BaseController
{
    private $salt;
    public function __construct()
    {
        $this->salt="gPq2FuCheRmMHCG7";
    }

    public function login(Request $request){

        $user = User:: where("username", "=", $request->input('Username'))
                      ->where("password", "=", sha1($this->salt.$request->input('PasswordString')))
                      ->first();
        if ($user) {
            $token=uniqid();
            $user->api_token=$token;
            $user->save();

            $response = ['status' => 'ACCEPTED', 'token' => $user->api_token];
            return response()->json($response)->setStatusCode(202);
        } else {
            $response = ['status' => 'USER AUTHENTICATION FAILED'];
            return response()->json($response)->setStatusCode(401);
        }

    }

    public function register(Request $request){
        $user = new User;
        $user->name=$request->input('Name');
        $user->username=$request->input('Username');
        $user->password=sha1($this->salt.$request->input('PasswordString'));
        $user->email=$request->input('Email');
        $user->api_token=uniqid();

        try
        {
            $user->save();
            $response = ['status' => 'ACCEPTED'];
            return response()->json($response)->setStatusCode(202);
        }
        catch (QueryException $exception)
        {
            $response = [
                'status' => 'REQUEST CANNOT BE SAVED' ,
                'message' => $exception->getMessage()
                ];
            return response()->json($response)->setStatusCode(500);
        }

    }

    public function update(Request $request){

        $user = User:: where("username", "=", $request->input('Username'))->first();

        if ($user) {
            $user->name=$request->input('Name');
            $user->username=$request->input('Username');
            $user->password=sha1($this->salt.$request->input('PasswordString'));
            $user->email=$request->input('Email');
            $user->api_token=uniqid();

            try
            {
                $user->save();
                $response = ['status' => 'ACCEPTED'];
                return response()->json($response)->setStatusCode(202);
            }
            catch (QueryException $exception)
            {
                $response = [
                    'status' => 'REQUEST CANNOT BE SAVED' ,
                    'message' => $exception->getMessage()
                    ];
                return response()->json($response)->setStatusCode(500);
            }

        } else {
            $response = ['status' => 'USER DOES NOT EXIST OR UNAUTHORIZED'];
            return response()->json($response)->setStatusCode(401);
        }

    }

    public function delete(Request $request){

        $user = User:: where("id", "=", $request->input('Id'))->first();

        if ($user) {
            if($user->delete()){
                $response = ['status' => 'ACCEPTED'];
                return response()->json($response)->setStatusCode(202);
            } else {
                $response = ['status' => 'REQUEST CANNOT BE SAVED. CHECK YOUR DATABASE AND TRY AGAIN.'];
                return response()->json($response)->setStatusCode(500);
            }
        } else {
            $response = ['status' => 'USER DOES NOT EXIST OR UNAUTHORIZED'];
            return response()->json($response)->setStatusCode(401);
        }


    }

    public function info(){
        return Auth::user();
    }

    public function userList(){
        $response = User::all();
        return response()->json($response)->setStatusCode(202);
    }
}

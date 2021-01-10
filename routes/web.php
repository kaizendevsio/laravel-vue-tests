<?php

use App\Http\Middleware\Authenticate;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
	return view('App');
});


$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('users/list', [
     'uses' => 'UserController@userList'
    ]);

    $router->get('users/info', [
     'uses' => 'UserController@info'
    ]);

    $router->put('users', [
     'middleware' => 'userUpdate',
     'uses' => 'UserController@update'
     ]);

    $router->delete('users', [
     'middleware' => 'userDelete',
     'uses' => 'UserController@delete'
     ]);


});


$router->post('users/login', [
    'middleware' => 'authorization',
    'uses' => 'UserController@login'
    ]);

$router->post('users', [
    'middleware' => 'registration',
    'uses' => 'UserController@register'
    ]);




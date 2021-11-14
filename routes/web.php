<?php

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
    return $router->app->version();
});

$router->post('/api/v1/auth/register', 'AuthController@register');
$router->post('/api/v1/auth/login', 'AuthController@login');
$router->get('/api/v1/auth/me', 'AuthController@me');

$router->get('/api/v1/users', 'UserController@FindAll');
$router->get('/api/v1/users/{userId}', 'UserController@FindById');
$router->post('/api/v1/users', 'UserController@Create');
$router->put('/api/v1/users/{userId}', 'UserController@Update');
$router->delete('/api/v1/users/{userId}', 'UserController@Delete');

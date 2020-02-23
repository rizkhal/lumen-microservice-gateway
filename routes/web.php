<?php

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
    return Illuminate\Support\Str::random(32);
    return $router->app->version();
});

$router->group(['middleware' => 'client'], function() use($router) {
    $router->get('/test', function() {
        return 'hell yeah it works!';
    });
});

$router->group(['middleware' => 'client'], function() use($router) {
    $router->group(['prefix' => 'api'], function() use($router) {
        $router->group(['prefix' => 'v1'], function() use($router) {
            $router->get('authors', 'AuthorController@index');
            $router->get('authors/{id}', 'AuthorController@show');
            $router->post('authors', 'AuthorController@store');
            $router->put('authors/{id}', 'AuthorController@update');
            $router->delete('authors/{id}', 'AuthorController@destroy');

            $router->get('books', 'BookController@index');
            $router->get('books/{id}', 'BookController@show');
            $router->post('books', 'BookController@store');
            $router->put('books/{id}', 'BookController@update');
            $router->delete('books/{id}', 'BookController@destroy');
        });
    });
});
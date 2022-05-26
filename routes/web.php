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
$router->get('/', function () use ($router){
    //Rota de home externa
    return 'Teste API para busca de cep ! '.$router->app->version();
});


$router->group(['prefix' => 'search'], function() use($router){

    $router->get('/local/{ceps}', 'BuscarcepController@search');

});
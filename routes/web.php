<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/status', 'api\ContatoController@status');

Route::namespace('api')->group(function () {
    Route::get('/contatos', 'ContatoController@list');
    Route::get('/contatos/{id}', 'ContatoController@view');
    Route::post('/contatos', 'ContatoController@create');
    Route::put('/contatos/{id}', 'ContatoController@update');
    Route::delete('/contatos/{id}', 'ContatoController@delete');
});

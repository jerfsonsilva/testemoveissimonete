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
	return view('posts');
});

Route::get('/post/{id}', 'Artigo\ArtigoController@artigoView');

#API

Route::prefix('artigos')->group(function () {
	Route::get('/','Artigo\ArtigoController@index');
});

Route::get('artigo/{id}','Artigo\ArtigoController@artigo');


Route::prefix('contatos')->group(function () {
	Route::get('/','Contato\ContatoController@index');
	Route::post('add/','Contato\ContatoController@add');
});






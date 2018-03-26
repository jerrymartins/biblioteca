<?php

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
 
Route::get("/", function () {
    return view("templates.app");
});

Route::group(['prefix' => 'autores'], function () {
    Route::get("/", "AutorController@index");
    Route::get("/cadastro", "AutorController@cadastroView");
    Route::post("/salva", "AutorController@armazena");
    Route::get("/edita/{id}", "AutorController@editaView");
    Route::post("/atualiza", "AutorController@atualiza");
    Route::get("/deleta/{id}", "AutorController@deleta");

});

Route::group(['prefix' => 'livros'], function () {
    Route::get("/novoLivro/{id}", "LivroController@cadastroLivroView");
    Route::post("/salvaLivro", "LivroController@novoLivro");
    

});
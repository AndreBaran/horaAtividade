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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/professor',['as'=>'admin.professor','uses'=>'ProfessorController@index']);
Route::get('/admin/professor/adicionar',['as'=>'admin.professor.adicionar','uses'=>'ProfessorController@adicionar']);
Route::post('/admin/professor/salvar',['as'=>'admin.professor.salvar','uses'=>'ProfessorController@salvar']);
Route::get('/admin/professor/editar/{id}',['as'=>'admin.professor.editar','uses'=>'ProfessorController@editar']);    
Route::put('/admin/professor/atualizar/{id}',['as'=>'admin.professor.atualizar','uses'=>'ProfessorController@atualizar']);
Route::get('/admin/professor/deletar/{id}',['as'=>'admin.professor.deletar','uses'=>'ProfessorController@deletar']);

Route::get('/admin/tipoatividade',['as'=>'admin.tipoatividade','uses'=>'TipoAtividadeController@index']);
Route::get('/admin/tipoatividade/adicionar',['as'=>'admin.tipoatividade.adicionar','uses'=>'TipoAtividadeController@adicionar']);
Route::post('/admin/tipoatividade/salvar',['as'=>'admin.tipoatividade.salvar','uses'=>'TipoAtividadeController@salvar']);
Route::get('/admin/tipoatividade/editar/{id}',['as'=>'admin.tipoatividade.editar','uses'=>'TipoAtividadeController@editar']);    
Route::put('/admin/tipoatividade/atualizar/{id}',['as'=>'admin.tipoatividade.atualizar','uses'=>'TipoAtividadeController@atualizar']);
Route::get('/admin/tipoatividade/deletar/{id}',['as'=>'admin.tipoatividade.deletar','uses'=>'TipoAtividadeController@deletar']);



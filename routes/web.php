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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



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

//Route::get('/admin/fullcalendar', 'FullCalendarController@index')->name('home');
Route::get('/admin/fullcalendar', ['as'=>'admin.fullcalendar','uses'=>'FullCalendarController@index']);
Route::get('/admin/fullcalendar/load-atividades', 'AtividadeController@loadAtividades')->name('routeLoadAtividades');
Route::put('/admin/fullcalendar/atividade-update', 'AtividadeController@update')->name('routeAtividadeUpdate');
Route::post('/admin/fullcalendar/atividade-add', 'AtividadeController@add')->name('routeAtividadeAdd');
Route::delete('/admin/fullcalendar/atividade-destroy', 'AtividadeController@destroy')->name('routeAtividadeDestroy');

//Route::get('/admin/fullcalendar/professor-load', 'AtividadeController@loadProfessores')->name('routeLoadProfessores');

Route::get('/admin/professor/professor-load', 'ProfessorController@loadProfessores')->name('routeLoadProfessores');

Route::get('/admin/tipoatividade/tipo-load', 'TipoAtividadeController@loadTipos')->name('routeLoadTipos');
Route::get('/admin/tipoatividade/tipoinfo-load/{id}', 'TipoAtividadeController@loadTipoinfos')->name('routeLoadTipoinfos');

Route::get('/admin/atividade/load-atividade-week', 'AtividadeController@loadAtividadeWeeks')->name('routeLoadAtividadeWeeks');





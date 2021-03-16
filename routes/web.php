<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

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

Route::get('/admin/escola',['as'=>'admin.escola','uses'=>'EscolaController@index']);
Route::get('/admin/escola/adicionar',['as'=>'admin.escola.adicionar','uses'=>'EscolaController@adicionar']);
Route::post('/admin/escola/salvar',['as'=>'admin.escola.salvar','uses'=>'EscolaController@salvar']);
Route::get('/admin/escola/editar/{id}',['as'=>'admin.escola.editar','uses'=>'EscolaController@editar']);    
Route::put('/admin/escola/atualizar/{id}',['as'=>'admin.escola.atualizar','uses'=>'EscolaController@atualizar']);
Route::get('/admin/escola/deletar/{id}',['as'=>'admin.escola.deletar','uses'=>'EscolaController@deletar']);



Route::get('/admin/user',['as'=>'admin.user','uses'=>'UserController@index']);
Route::get('/admin/user/adicionar',['as'=>'admin.user.adicionar','uses'=>'UserController@adicionar']);
Route::post('/admin/user/salvar',['as'=>'admin.user.salvar','uses'=>'UserController@salvar']);
Route::get('/admin/user/editar/{id}',['as'=>'admin.user.editar','uses'=>'UserController@editar']);    
Route::put('/admin/user/atualizar/{id}',['as'=>'admin.user.atualizar','uses'=>'UserController@atualizar']);
Route::get('/admin/user/deletar/{id}',['as'=>'admin.user.deletar','uses'=>'UserController@deletar']);


//Route::get('/admin/fullcalendar', 'FullCalendarController@index')->name('home');
Route::get('/admin/fullcalendar', ['as'=>'admin.fullcalendar','uses'=>'FullCalendarController@index']);
Route::get('/admin/fullcalendar/load-atividades', 'AtividadeController@loadAtividades')->name('routeLoadAtividades');
Route::put('/admin/fullcalendar/atividade-update', 'AtividadeController@update')->name('routeAtividadeUpdate');
Route::post('/admin/fullcalendar/atividade-add', 'AtividadeController@add')->name('routeAtividadeAdd');
Route::delete('/admin/fullcalendar/atividade-destroy', 'AtividadeController@destroy')->name('routeAtividadeDestroy');

Route::put('/admin/mensagem/mensagem-update', 'MensagemController@update')->name('routeMensagemUpdate');
Route::post('/admin/mensagem/mensagem-add', 'MensagemController@add')->name('routeMensagemAdd');
Route::delete('/admin/mensagem/mensagem-destroy', 'MensagemController@destroy')->name('routeMensagemDestroy');
Route::get('/admin/mensagem/mensagem-pendentes', 'MensagemController@loadPendentes')->name('routeMensagemPendentes');

//Route::get('/admin/fullcalendar/professor-load', 'AtividadeController@loadProfessores')->name('routeLoadProfessores');

Route::get('/admin/professor/professor-load', 'ProfessorController@loadProfessores')->name('routeLoadProfessores');

Route::get('/admin/escola/escola-load', 'EscolaController@loadEscola')->name('routeLoadEscola');

Route::get('/admin/tipoatividade/tipo-load', 'TipoAtividadeController@loadTipos')->name('routeLoadTipos');
Route::get('/admin/tipoatividade/tipoinfo-load/{id}', 'TipoAtividadeController@loadTipoinfos')->name('routeLoadTipoinfos');

Route::get('/admin/atividade/load-atividade-week', 'AtividadeController@loadAtividadeWeeks')->name('routeLoadAtividadeWeeks');

Route::get('/admin/mensagem',['as'=>'admin.mensagem','uses'=>'MensagemController@index']);
Route::get('/admin/mensagem/adicionar',['as'=>'admin.mensagem.adicionar','uses'=>'MensagemController@adicionar']);
Route::post('/admin/mensagem/salvar',['as'=>'admin.mensagem.salvar','uses'=>'MensagemController@salvar']);
Route::get('/admin/mensagem/editar/{id}',['as'=>'admin.mensagem.editar','uses'=>'MensagemController@editar']);    
Route::put('/admin/mensagem/atualizar/{id}',['as'=>'admin.mensagem.atualizar','uses'=>'MensagemController@atualizar']);
Route::get('/admin/mensagem/deletar/{id}',['as'=>'admin.mensagem.deletar','uses'=>'MensagemController@deletar']);




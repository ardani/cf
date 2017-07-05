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

Route::get('/','MainController@index');
Route::post('/','MainController@process');

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::get('gejala', 'GejalaController@index');
Route::get('gejala/create', 'GejalaController@create');
Route::post('gejala/create', 'GejalaController@store');
Route::get('gejala/{id}/edit', 'GejalaController@edit');
Route::post('gejala/{id}/edit', 'GejalaController@update');
Route::get('gejala/{id}/delete', 'GejalaController@delete');

Route::get('penyakit', 'PenyakitController@index');
Route::get('penyakit/create', 'PenyakitController@create');
Route::post('penyakit/create', 'PenyakitController@store');
Route::get('penyakit/{id}/edit', 'PenyakitController@edit');
Route::post('penyakit/{id}/edit', 'PenyakitController@update');
Route::get('penyakit/{id}/delete', 'PenyakitController@delete');

Route::get('option', 'OptionController@index');
Route::get('option/create', 'OptionController@create');
Route::post('option/create', 'OptionController@store');
Route::get('option/{id}/edit', 'OptionController@edit');
Route::post('option/{id}/edit', 'OptionController@update');
Route::get('option/{id}/delete', 'OptionController@delete');

Route::get('hasil', 'HasilController@index');
Route::post('hasil/proses', 'HasilController@proses');

Route::get('pengetahuan', 'PengetahuanController@index');
Route::post('pengetahuan/create', 'PengetahuanController@store');

Route::get('test', function (){
   return autonumber('gejala','kode_gejala','G');
});
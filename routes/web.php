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
Auth::routes();
Route::group(['middleware'=>'auth'],function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/mydecisions', 'DecisionsController@getMyDecisions')->name('mydecisions');
    Route::get('/AllDecisions', 'DecisionsController@getAllDecisions')->name('decisions');
    Route::post('/decisions/store', 'DecisionsController@store')->name('decision.store');
    Route::post('/decisions/update', 'DecisionsController@update')->name('decision.update');
    Route::get('/admins', "UsersController@getAllUser")->name('getAllUsers');
    Route::get('/AllWilaya', 'WilayasController@getAllWilayas')->name('wilayas');
    Route::post('/wilaya/store', 'WilayasController@store')->name('wilaya.store');
    Route::post('/wilaya/update', 'WilayasController@update')->name('wilaya.update');
    Route::get('/Myprofile', 'UsersController@Myprofile')->name('myprofile');
    Route::get('/decision/delete/{id}','DecisionsController@delete')->name('decision.delete');
    Route::get('/wilaya/delete/{id}','WilayasController@delete')->name('wilaya.delete');
    Route::post('/Myprofile/edit', 'UsersController@update')->name('user.update');



});








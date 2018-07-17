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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('editProfile','ProfileController@edit');
    Route::post('updateProfile','ProfileController@update');

    Route::get('editPassword','ProfileController@editPassword');
    Route::post('updatePassword','ProfileController@updatePassword');



Route::resource('Installments', 'InstallmentsController');


Route::delete('Installments/forcedelete/{id}','InstallmentsController@forcedelete');


Route::get('Installments/showOnlyTrashed/{id}', 'InstallmentsController@showOnlyTrashed');


Route::get('reports','InstallmentsController@reports');


Route::get('archive','InstallmentsController@archive');





});
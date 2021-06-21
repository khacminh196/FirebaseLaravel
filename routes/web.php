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

Route::get('mess', 'FirebaseController@index');
Route::get('sendMess', 'FirebaseController@sendMess');
Route::get('registration', 'FirebaseController@registration');
Route::get('login', 'FirebaseController@login');
Route::get('loginWithIdToken', 'FirebaseController@loginWithIdToken');
Route::get('firestore', 'FirebaseController@firestore');
Route::get('userInfo', 'FirebaseController@userInfo');
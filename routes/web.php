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


Route::get('/change-password', function () {
    return view('change-password');
});

Route::get('/login','UserController@login')->name("login");
Route::get('/sign-in','UserController@signIn');

Route::post('user/authentication','UserController@doAuthenticationUser')->name('user-authentication');
Route::get('/logout','UserController@logout');
Route::post('/user','UserController@addUser')->name('addUser');




Route::group(['middleware' => 'adminsession'], function () {
    Route::get('/','UserTaskController@index')->name("index");
    Route::get('/city/{id}','CityController@getCityByState');
    Route::post('/user-update','UserController@addUser')->name('user-update');
    Route::post('/user-task','UserTaskController@addUserTask')->name('userTask');
    Route::get('/user-task/{id?}',"UserTaskController@index");
    Route::get('/user-task/delete/{id}',"UserTaskController@deleteUserTask");
    Route::post('/password-change',"UserController@passwordChange")->name('password-change');
    Route::get('/profile','UserController@profile');
    Route::get('/admin/user','AdminController@listUserTask');
    Route::get('/admin/view/{id}','AdminController@view');
    Route::get('admin/user-task/{id}','AdminController@userTask');
    Route::get('user/active/{id}','UserController@ActiveInActive');
    Route::get('user/in-active/{id}','UserController@ActiveInActive');
});




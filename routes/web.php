<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|39434934394993o3i33oi55ivw4444444444444i44
*/

Auth::routes(['register' => false]);                                            


// Auth::routes();
Route::get('/', 'HomeController@pages');
Route::get('/home', 'HomeController@index')->name('home');


//User Controller
Route::resources([
    'employees' => 'UserController',
]);

//Request Overtime
Route::resources([
    'requests' => 'RequesterController',
]);
// User Registration
Route::post('registerUser', 'UserController@store');


// Request Approve by Supervisor
Route::post('approve1', 'SupervisorController@approve');
Route::post('decline1', 'SupervisorController@decline');

// Request Approval by Manager
Route::post('approve2', 'ManagerController@approve');
Route::post('decline2', 'ManagerController@decline');


// View Pages
Route::get('/admin', 'HomeController@admin');
Route::get('/supervisor', 'HomeController@supervisor');
Route::get('/manager', 'HomeController@manager');
Route::get('/hr', 'HomeController@hr');
Route::get('/requester', 'HomeController@requester');




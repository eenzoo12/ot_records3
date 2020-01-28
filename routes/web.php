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
    'requests' => 'SupervisorController',
]);
// Request Approve by Manager
Route::get('approve1', 'ManagerController@approve');
Route::get('decline1', 'ManagerController@decline');


// View Pages
Route::get('/admin', 'HomeController@admin');
Route::get('/manager', 'HomeController@manager');
Route::get('/kmanager', 'HomeController@kmanager');
Route::get('/hr', 'HomeController@hr');
Route::get('/requester', 'HomeController@supervisor');



// Route::get('/hr/allreq', function(){
//     view('pages.overtime.hr');
// });
// Route::get('/hr/pending', function(){
//     view('pages.overtime.hr');
// });
// Route::get('/hr/finished', function(){
//     view('pages.overtime.hr');
// });


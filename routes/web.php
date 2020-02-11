<?php


use App\Exports\RequestsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Controllers\Controller;
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
// Void the Built in Register button
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
//HR Request View
Route::resources([
    'hreq' => 'HRController',
]);



// User Registration
Route::post('registerUser', 'UserController@store');

// Request Approve by Supervisor
Route::post('approve1', 'SupervisorController@approve');
Route::post('decline1', 'SupervisorController@decline');
Route::get('svr', 'SupervisorController@index');

// Request Approval by Manager
Route::post('approve2', 'ManagerController@approve');
Route::post('decline2', 'ManagerController@decline');
Route::get('mgr', 'ManagerController@index');



// View Pages
Route::get('/admin', 'HomeController@admin');
Route::get('/supervisor', 'HomeController@supervisor');
Route::get('/manager', 'HomeController@manager');
Route::get('/hr', 'HomeController@hr');
Route::get('/requester', 'HomeController@requester');

Route::get('/downloadExport', function(){

    return Excel::download(new RequestsExport, 'overtime.xlsx');

        // Storing of excel file in storage
    // Excel::store(new RequestsExport, 'request.xlsx');
    // return "Done"

        // Download excel file
    // return Excel::download(new RequestsExport, 'request.csv');
});




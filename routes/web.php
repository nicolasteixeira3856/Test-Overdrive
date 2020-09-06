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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    /* Companies */
    Route::get('/companies', 'CompanyController@index')->name('companies');
    Route::get('/companies/create', 'CompanyController@create')->name('/companies/create');
    Route::post('/companies/store', 'CompanyController@store')->name('/companies/store');
    Route::post('/companies/destroy/{id}', 'CompanyController@destroy')->name('/companies/destroy');
    Route::get('/companies/edit/{id}', 'CompanyController@edit')->name('/companies/edit');
    Route::post('/companies/update/{id}', 'CompanyController@update')->name('/companies/update');
    /* Employees */
    Route::get('/employees', 'EmployeeController@index')->name('employees');
    Route::get('/employees/create', 'EmployeeController@create')->name('/employees/create');
    Route::post('/employees/store', 'EmployeeController@store')->name('/employees/store');
    Route::post('/employees/destroy/{id}', 'EmployeeController@destroy')->name('/employees/destroy');
    Route::get('/employees/edit/{id}', 'EmployeeController@edit')->name('/employees/edit');
    Route::post('/employees/update/{id}', 'EmployeeController@update')->name('/employees/update');
});

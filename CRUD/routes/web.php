<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employee_info_controller;

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

Route::get('/database-connection', function(){
    return view('db_con');
});

Route::get('/',[employee_info_controller::class,'showData']);

Route::get('/create', function () {
    return view('create_employee');
});
Route::get('edit/{id}',[employee_info_controller::class,'Edit']);
Route::get('delete/{id}',[employee_info_controller::class,'Delete']);
Route::POST('/insert-success' ,[employee_info_controller::class,'create_employee'])->name('create');
Route::POST('edit',[employee_info_controller::class,'Update']);



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('show-employee',[EmployeeController::class,'show_employee'])->name('employee');
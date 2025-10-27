<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Example route
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::post('create-employee',[EmployeeController::class,'store'])->name('create-employee');
Route::put('update-employee/{id}',[EmployeeController::class,'update'])->name('update-employee');
Route::delete('delete-employee/{id}',[EmployeeController::class,'delete'])->name('delete-employee');
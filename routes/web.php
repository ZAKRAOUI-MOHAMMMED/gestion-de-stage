<?php

use App\Http\Controllers\CalculController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;




Route::get('/', function () {
    return redirect("student");
});
// Route::get('/student',[StudentController::class, 'index']);
Route::resource("/students", StudentController::class);

Route::resource('stages', StageController::class);

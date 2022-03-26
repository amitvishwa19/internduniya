<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\student\StudentController;


Route::get('/', [StudentController::class, 'home'])->name('student.home');

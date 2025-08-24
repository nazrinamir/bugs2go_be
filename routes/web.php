<?php

use App\Http\Controllers\AuthControllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login']);
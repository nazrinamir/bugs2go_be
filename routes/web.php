<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ping', function () {
    return response()->json([
        'ok'   => true,
        'app'  => config('app.name'),
        'time' => now()->toDateTimeString(),
    ]);
});

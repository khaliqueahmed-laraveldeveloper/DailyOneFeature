<?php

use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('aws')->group(function () {
    Route::resource('file', FileController::class);
});

Route::prefix('cap')->group(function () {
    Route::get('/show', function () {
        return view('captcha.index');
    })->name('captcha.index');
    Route::post('check',function(Request $req){
    $req->validate([
        'captcha' => 'required|captcha'
    ]);
    return back()->with('success', 'Captcha is correct!');
    })->name('captcha.check');
});
<?php

use App\FileDataExport;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
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

Route::prefix('excel')->group(function (){
    //home for read uploaded excel file
    Route::get('/index',function(){
        return view('excel.index');
     })->name('excel.index');
     //home for export excel file
    Route::get('/export', function(){
        return Excel::download(new FileDataExport, 'files.xlsx');
    })->name('file.export');
   
});
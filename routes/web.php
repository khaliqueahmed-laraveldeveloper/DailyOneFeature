<?php

use App\FileDataExport;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
// use PhpOffice\PhpSpreadsheet\Writer\Pdf;
       use Dompdf\Dompdf;
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

Route::prefix('pdf')->group(function (){
    Route::get('/index', function(){

    $oder=[
        'order_id' => '123456',
        'customer_name' => 'John Doe', 
        'customer_email' => 'email@gmail.com',
        'customer_phone' => '1234567890',
        'customer_address' => '123 Main St, City, Country',
        'order_date' => '2023-10-01',
        'items' => [
            [
                'name' => 'Product 1',
                'quantity' => 2,
                'price' => 10.00,
            ],
            [
                'name' => 'Product 2',
                'quantity' => 1,
                'price' => 20.00,
            ],
        ],
        'total_amount' => "30.00$",
    ];      
        return view('pdf.index', compact('oder'));
    })->name('pdf.index');
    Route::get('/generate', function(){
 $oder=[
        'order_id' => '123456',
        'customer_name' => 'John Doe', 
        'customer_email' => 'email@gmail.com',
        'customer_phone' => '1234567890',
        'customer_address' => '123 Main St, City, Country',
        'order_date' => '2023-10-01',
        'items' => [
            [
                'name' => 'Product 1',
                'quantity' => 2,
                'price' => 10.00,
            ],
            [
                'name' => 'Product 2',
                'quantity' => 1,
                'price' => 20.00,
            ],
        ],
        'total_amount' => "30.00$",
    ];


// instantiate and use the dompdf class
$dompdf = new Dompdf();
$view = view('pdf.partisals.order', compact('oder'))->render();
$dompdf->loadHtml($view);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
    })->name('pdf.generate');
});
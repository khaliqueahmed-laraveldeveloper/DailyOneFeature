@extends('layouts.app')

@section('main')
    


<div class="container">
    <h2>Daily Components based practice</h2>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('file.index') }}" class="btn btn-primary m-3">AWS S3 Files</a>
        </div>
        <div class="col-md-12">
            <a href="{{ route('captcha.index') }}" class="btn btn-primary m-3">CAPTCHA</a>
        </div>
        {{-- <div class="col-md-12">
            <a href="{{ route('excel.index') }}" class="btn btn-primary m-3">Excel</a>
        </div> --}}
         <div class="col-md-12">
            <a href="{{ route('file.index') }}" class="btn btn-primary m-3">Export data</a>
        </div>
         <div class="col-md-12">
            <a href="{{ route('pdf.index') }}" class="btn btn-primary m-3">PDF Slip Generation</a>
        </div>
        
    </div>
</div>
@endsection
    use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
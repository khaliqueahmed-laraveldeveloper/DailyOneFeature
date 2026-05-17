@extends('layouts.app')
@section('main')
<div class="container">
    <h2>Excel File Upload</h2>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <p>This is a placeholder for the Excel file upload feature. You can implement the file upload form and processing logic here.</p>
        </div>  
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <p>After implementing the file upload, you can display the contents of the uploaded Excel file here.</p>
        </div>
    </div>
    <div>
        <form action="{{route('excel.upload')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <input type="file" name="excel_file" class="form-control mb-3">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
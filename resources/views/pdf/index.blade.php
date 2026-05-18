@extends('layouts.app')

@section('main')
<div class="container">
    <div>
        @include('pdf.partisals.order')
    </div>
     <div class="row justify-content-center mx-auto">
            <div class="col-md-12 mx-auto">
                <a href="{{ route('pdf.generate') }}" class="btn btn-primary m-3">Generate PDF Slip</a>
            </div>
        </div>
</div>
@endsection
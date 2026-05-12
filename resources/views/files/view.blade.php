@extends('layouts.app')

@push('main')
<div class="container">
    <h2>File Detailed View</h2>

    <div class="row justify-content-center">
        @if($type=='image')
        <img src="{{$url}}" alt="image" class="img-fluid mb-3">
        @elseif($type=='application')
        
        <p>this is url for text file {{$type}}</p>
        <embed src="{{$url}}" type="application/pdf" width="100%" height="600px" />
        @elseif($type=='video')
        <video controls width="100%">
            <source src="{{$url}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        @else
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">File Content</h5>
                <p class="card-text">Unable to display this file type. You can download it instead.</p>
                <a href="{{$url}}" class="btn btn-primary" download>Download</a>
            </div>
        </div>
        @endif
    </div>
   
</div>
@endpush('main')


@extends('layouts.app')
@section('main')
    

<div class="container">
<h1>Captcha</h1>

<p>This is a simple CAPTCHA implementation.</p>
<p>Following are the steps to make simple captcha in laravel </p>
<ol>
    <li>install package simpley using: composer require mews/captcha</li>
    <li>" !!captcha_img() !!" function for show image on blade or captcha_src() for src of an image both your cohoise.
         <small>don't use captcha rute its for look direct image you route path should be different </small></li>
    <li>after showing image next step is match the captcha function</li>
    <li>a request send towards function a post that validate though its type using sessions and return true if value match with session</li>
</ol>


<div style="width: 200px">
    <form method="POST" action="{{ route('captcha.check') }}">
    @csrf

    <div>
        {!! captcha_img() !!}
    </div>

    <br>

    <input type="text" class="form-control m-3" name="captcha" placeholder="Enter captcha">

    <button type="submit" class="btn btn-primary">
        Submit
    </button>

    @error('captcha')
        <p style="color:red">{{ $message }}</p>
    @enderror
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

</form>
    </div>
</div>
@endsection
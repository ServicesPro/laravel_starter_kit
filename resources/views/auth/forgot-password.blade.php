@extends('layouts.auth.app', ['title' => 'Reset Password', 'subtitle' => 'Enter your Email and instructions will be sent to you!'])

@section('content')

@if ($errors->any())
    <div class="alert alert-outline-warning alert-warning-shadow mb-0 alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
        </button>
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
    </div>

    @foreach ($errors->all() as $error)
        <div class="mt-2 alert icon-custom-alert alert-outline-pink fade show" role="alert">
            <i class="mdi mdi-alert-outline alert-icon"></i>
            <div class="alert-text">
                {{ $error }}
            </div>

            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close text-danger"></i></span>
                </button>
            </div>
        </div>
    @endforeach
@endif

<form method="POST" class="form-horizontal auth-form my-4" action="{{ route('password.email') }}">
    @csrf

    <div class="form-group">
        <label for="email">Email</label>
        <div class="input-group mb-3">
            <span class="auth-form-icon">
                <i class="dripicons-mail"></i>
            </span>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus  class="form-control" id="email" placeholder="Enter Email">
        </div>
    </div><!--end form-group-->


    <div class="form-group mb-0 row">
        <div class="col-12 mt-2">
            <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">{{ __('Email Password Reset Link') }} <i class="fas fa-sign-in-alt ml-1"></i></button>
        </div><!--end col-->
    </div> <!--end form-group-->
</form><!--end form-->
@endsection

@section('login')
<div class="m-3 text-center text-muted">
    <p class="">Remember It ?  <a href="{{ route('login') }}" class="text-primary ml-2">Sign in here</a></p>
</div>
@endsection

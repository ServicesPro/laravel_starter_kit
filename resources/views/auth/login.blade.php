@extends('layouts.auth.app', ['title' => 'Let\'s Get Started', 'subtitle' => 'Sign in to continue '])

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

<form method="POST" class="form-horizontal auth-form my-4" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
        <label for="email">Email</label>
        <div class="input-group mb-3">
            <span class="auth-form-icon">
                <i class="far fa-envelope"></i>
            </span>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Enter email" required autofocus>
        </div>
    </div><!--end form-group-->

    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group mb-3">
            <span class="auth-form-icon">
                <i class="dripicons-lock"></i>
            </span>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password"  placeholder="Enter password" >
        </div>
    </div><!--end form-group-->

    <div class="form-group row mt-4">
        <div class="col-sm-6">
            <div class="custom-control custom-switch switch-success">
                <input type="checkbox" name="remenber" class="custom-control-input" id="customSwitchSuccess">
                <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
            </div>
        </div><!--end col-->
        @if (Route::has('password.request'))
            <div class="col-sm-6 text-right">
                <a href="{{ route('password.request') }}" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>
            </div><!--end col-->
        @endif
    </div><!--end form-group-->

    <div class="form-group mb-0 row">
        <div class="col-12 mt-2">
            <button class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
        </div><!--end col-->
    </div> <!--end form-group-->
</form><!--end form-->
</div><!--end /div-->

<div class="m-3 text-center text-muted">
<p class="">Don't have an account ?  <a href="{{ route('register') }}" class="text-primary ml-2">Free Register</a></p>
</div>
@endsection

{{-- @section('socials')
<div class="account-social text-center mt-4">
    <h6 class="my-4 to-blue-400">Or Login With</h6>
    <ul class="list-inline mb-4">
        <li class="list-inline-item">
            <a href="" class="">
                <i class="fab fa-facebook-f facebook"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="" class="">
                <i class="fab fa-twitter twitter"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="" class="">
                <i class="fab fa-google google"></i>
            </a>
        </li>
    </ul>
</div>
@endsection --}}

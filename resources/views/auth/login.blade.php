@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container site-content py-5 my-4 d-flex flex-column">
    <div class="m-auto d-flex flex-column w-100">
        <h1 class="mx-auto my-3"><strong>Login</strong></h1>
        <div class="row justify-content-center m-auto w-100">
            <div class="col-lg-6 m-auto">
                <div class="card p-4">
                    <form method="POST" action="{{ route('login') }}" style="width:100% !important">
                        @csrf

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="">
                                        <i class="fas fa-envelope position-absolute" style="margin: 0.7rem;" ></i>
                                        <input id="email" type="email" style="padding-left: 2.25rem;" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="">
                                         <i class="fas fa-key position-absolute" style="margin: 0.7rem;" ></i>
                                        <input id="password" type="password" style="padding-left: 2.25rem;" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group d-flex">
                                    <div class="ml-auto mr-auto mr-lg-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 d-flex border-left" style="border-color: #dedede">
                                 <div class="m-auto w-100">
                                    <div class="w-100 d-flex flex-column">
                                        <button type="submit" class="btn btn-primary w-100 pb-1 pt-2 pl-0">
                                            <i class="fas fa-shoe-prints"></i> {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="mt-3 mx-auto" href="{{ route('password.request') }}">
                                                <small>{{ __('Forgot Your Password?') }}</small>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                     

                       
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

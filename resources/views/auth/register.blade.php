@extends('layouts.app')

@section('title', 'Register')


@section('content')
<div class="container site-content pt-5 my-4 d-flex flex-column">
    <div class="w-100 d-flex flex-column m-auto">
        <h1 class="mx-auto my-3"><strong>Register</strong></h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <form method="POST" action="{{ route('register') }}" style="width: 100% !important">
                        @csrf

                        <div class="row">
                            <div class="col-lg-8">

                                <div class="form-group">
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="">
                                        <i class="fas fa-envelope position-absolute" style="margin: 0.7rem;" ></i>
                                        <input id="email" type="email" style="padding-left: 2.25rem;"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="">
                                        <i class="fas fa-key position-absolute" style="margin: 0.7rem;" ></i>
                                        <input id="password" type="password" style="padding-left: 2.25rem;"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="">
                                        <i class="fas fa-key position-absolute" style="margin: 0.7rem;" ></i>
                                        <input id="password-confirm" style="padding-left: 2.25rem;"  type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-4 border-left d-flex flex-column" style="border-color: #dedede" >
                                <div class="form-group m-auto d-flex flex-column">
                                    <strong>
                                    <label for="type" class="col-form-label text-md-right">{{ __('Account Type') }}</label></strong>

                                    <div class="m-auto">
                                        <input id="type" type="radio" name="type" value="admin" checked> <i class="fas fa-user-cog"></i> Administrator<br>
                                        <input id="type" type="radio" name="type" value="agency"> <i class="fas fa-luggage-cart"></i> Travel Agency<br>
                                        <input id="type" type="radio" name="type" value="customer"> <i class="fas fa-user-tag"></i> Customer

                                        @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group mb-4 w-100">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-sign-in-alt"></i> {{ __('Register') }}
                                        </button>
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

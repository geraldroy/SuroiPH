@extends('layouts.app')

@section('title', 'Create Agency Profile')

@section('content')
<div class="container site-content py-5 mt-5 d-flex">
    <div class="row justify-content-center m-0 flex-column m-auto w-100">
        <h1 class="mx-auto my-3"><strong> {{ __('Create Agency Profile') }}</strong></h1>
        <div class="col-12">
                <div class="card p-4">
                    <form method="POST" action="{{ route('agencies.store') }}" style="width: 100% !important">
                        @csrf

                        <input id="user_id" name="user_id" type="hidden" value="{{ Auth::id() }}">

                        <div class="form-group row">
                            <div class="col-lg-6">
                                 <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                                <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                 <label for="description" class="col-form-label text-md-right">{{ __('Description') }}</label>

                                 <textarea id="description" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" required> </textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif

                                <label for="address" class="col-form-label text-md-right">{{ __('Office Address') }}</label>

                                <input id="address" type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="col-md-6 d-flex flex-column">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="mobile1" class="col-form-label text-md-right">{{ __('Mobile Number 1') }}</label>
                                        <input id="mobile1" type="text" name="mobile1" class="form-control{{ $errors->has('mobile1') ? ' is-invalid' : '' }}" required>

                                        @if ($errors->has('mobile1'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mobile1') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="col-md-6">
                                        <label for="mobile2" class="col-form-label text-md-right">{{ __('Mobile Number 2') }}</label>

                                         <input id="mobile2" type="text" name="mobile2" class="form-control{{ $errors->has('mobile2') ? ' is-invalid' : '' }}">

                                        @if ($errors->has('mobile2'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mobile2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                         <label for="landline1" class="col-form-label text-md-right">{{ __('Landline Number 1') }}</label>

                                         <input id="landline1" type="text" name="landline1" class="form-control{{ $errors->has('landline1') ? ' is-invalid' : '' }}">

                                        @if ($errors->has('landline1'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('landline1') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                         <label for="landline2" class="col-form-label text-md-right">{{ __('Landline Number 2') }}</label>

                                         <input id="landline2" type="text" name="landline2" class="form-control{{ $errors->has('landline2') ? ' is-invalid' : '' }}">

                                        @if ($errors->has('landline2'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('landline2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div>
                                    <label for="fax" class="col-form-label text-md-right">{{ __('Fax Number') }}</label>

                                
                                    <input id="fax" type="text" name="fax" class="form-control{{ $errors->has('fax') ? ' is-invalid' : '' }}">

                                    @if ($errors->has('fax'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fax') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="d-flex mt-auto">
                                    <button type="submit" class="btn btn-primary w-100 pt-2 pb-1">
                                        <i class="fas fa-plus"></i> {{ __('Create Profile') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
       
        </div>
    </div>
</div>
@endsection

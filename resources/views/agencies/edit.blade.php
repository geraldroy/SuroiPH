@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Agency Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('AgencyController@update', $id) }}">
                        @csrf

                        <input name="_method" type="hidden" value="PATCH">
                        <input id="user_id" name="user_id" type="hidden" value="{{ Auth::id() }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" class="form-control" value="{{$agency->name}}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" name="description" class="form-control" rows="5" required> {{ $agency->description }} </textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Office Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" name="address" class="form-control" value="{{$agency->address}}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile1" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number 1') }}</label>

                            <div class="col-md-6">
                                <input id="mobile1" type="text" name="mobile1" class="form-control" value="{{$agency->mobile1}}" required>

                                @if ($errors->has('mobile1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile2" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number 2') }}</label>

                            <div class="col-md-6">
                                <input id="mobile2" type="text" name="mobile2" class="form-control" value="{{$agency->mobile2}}">

                                @if ($errors->has('mobile2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="landline1" class="col-md-4 col-form-label text-md-right">{{ __('Landline Number 1') }}</label>

                            <div class="col-md-6">
                                <input id="landline1" type="text" name="landline1" class="form-control" value="{{$agency->landline1}}">

                                @if ($errors->has('landline1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('landline1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="landline2" class="col-md-4 col-form-label text-md-right">{{ __('Landline Number 2') }}</label>

                            <div class="col-md-6">
                                <input id="landline2" type="text" name="landline2" class="form-control" value="{{$agency->landline2}}">

                                @if ($errors->has('landline2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('landline2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fax" class="col-md-4 col-form-label text-md-right">{{ __('Fax Number') }}</label>

                            <div class="col-md-6">
                                <input id="fax" type="text" name="fax" class="form-control" value="{{$agency->fax}}">

                                @if ($errors->has('fax'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

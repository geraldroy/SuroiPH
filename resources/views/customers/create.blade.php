@extends('layouts.app')

@section('content')
<div class="container mt-5 site-content py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf

                        <input id="user_id" name="user_id" type="hidden" value="{{ Auth::id() }}">

                        <div class="form-group row">
                            <label for="name_last" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="name_last" type="text" name="name_last" class="form-control{{ $errors->has('name_last') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('name_last'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_last') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_first" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="name_first" type="text" name="name_first" class="form-control{{ $errors->has('name_first') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('name_first'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_first') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_middle" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="name_middle" type="text" name="name_middle" class="form-control{{ $errors->has('name_middle') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('name_middle'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_middle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_suffix" class="col-md-4 col-form-label text-md-right">{{ __('Suffix') }}</label>

                            <div class="col-md-6">
                                <input id="name_suffix" type="text" name="name_suffix" class="form-control{{ $errors->has('name_suffix') ? ' is-invalid' : '' }}">

                                @if ($errors->has('name_suffix'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_suffix') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_street1" class="col-md-4 col-form-label text-md-right">{{ __('Street Line 1') }}</label>

                            <div class="col-md-6">
                                <input id="address_street1" type="text" name="address_street1" class="form-control{{ $errors->has('address_street1') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('address_street1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_street1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_street2" class="col-md-4 col-form-label text-md-right">{{ __('Street Line 2') }}</label>

                            <div class="col-md-6">
                                <input id="address_street2" type="text" name="address_street2" class="form-control{{ $errors->has('address_street2') ? ' is-invalid' : '' }}">

                                @if ($errors->has('address_street2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_street2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_barangay" class="col-md-4 col-form-label text-md-right">{{ __('Barangay') }}</label>

                            <div class="col-md-6">
                                <input id="address_barangay" type="text" name="address_barangay" class="form-control{{ $errors->has('address_barangay') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('address_barangay'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_barangay') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_mun_city" class="col-md-4 col-form-label text-md-right">{{ __('City / Municipality') }}</label>

                            <div class="col-md-6">
                                <input id="address_mun_city" type="text" name="address_mun_city" class="form-control{{ $errors->has('address_mun_city') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('address_mun_city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_mun_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_province" class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>

                            <div class="col-md-6">
                                <input id="address_province" type="text" name="address_province" class="form-control{{ $errors->has('address_province') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('address_province'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_province') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" name="mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" name="birthday" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('birthday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Profile') }}
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

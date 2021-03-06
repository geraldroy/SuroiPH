@extends('layouts.app')

@section('title', 'Editing Customer Profile')

@section('content')
<div class="my-5 d-flex w-100 container site-content flex-column transaction">
  <div class="row w-100">
    <div class="col-lg-10 mx-auto">
        <form id="basic-info" class="container-fluid" style="padding-top: 60px; width: 100% !important;" method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf
            <h1 class="h1 mb-4"><strong>Editing Profile </strong></h1>
            <h4 class="mb-4">Basic information</h4>
            <input id="user_id" name="user_id" type="hidden" value="{{ Auth::id() }}">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="transaction-surname"><strong> {{ __('Last Name') }} </strong></label>
                  <input type="text" name="name_last" class="form-control{{ $errors->has('name_last') ? ' is-invalid' : '' }}" id="name_last" value="{{ $customer->name_last }}" required>

                    @if ($errors->has('name_last'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name_last') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="name_first"><strong> {{ __('First Name') }} </strong></label>
                  <input type="text" name="name_first" class="form-control{{ $errors->has('name_first') ? ' is-invalid' : '' }}" id="name_first" value="{{ $customer->name_first }}" required>

                  @if ($errors->has('name_first'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name_first') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="name_middle"><strong>{{ __('Middle Name') }} </strong></label>
                  <input type="text" class="form-control{{ $errors->has('name_middle') ? ' is-invalid' : '' }}" id="name_middle" name="name_middle" value="{{ $customer->name_middle }}" required>

                   @if ($errors->has('name_middle'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name_middle') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="name_suffix"><strong>{{ __('Suffix') }} </strong></label>
                  <input type="text" class="form-control{{ $errors->has('name_suffix') ? ' is-invalid' : '' }}" id="name_suffix" name="name_suffix" value="{{ $customer->name_suffix }}" >

                   @if ($errors->has('name_middle'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name_middle') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-control-group">
                    <label for="mobile"><strong>{{ __('Birthday') }} </strong></label>
                    <input type="date" name="birthday" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}"  id="birthday" value="{{ $customer->birthday }}" required>

                     @if ($errors->has('birthday'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birthday') }}</strong>
                        </span>
                    @endif
                </div>
              </div>

              <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                      <label for="sex"><strong>Sex</strong></label>
                      <select class="form-control" id="sex" name="sex">
                        <option selected></option>
                        <option >Male</option>
                        <option >Female</option>
                        <option >Unspecified</option>
                      </select>
                    </div>
                    <div class="col-md-8">
                      <label for="nation"><strong>Nationality</strong></label>
                      <div class="form-group">
                        <input type="text" class="form-control" name="nation" id="nation" placeholder="E.g. Filipino">
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="mobile"><strong>{{ __('Phone Number') }} </strong></label>
                    <input type="text" name="mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" id="mobile" value="{{ $customer->mobile }}" required>

                    @if ($errors->has('mobile'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>

                 <div class="col-6">
                  <div class="form-group">
                    <label for="email"><strong>Email address </strong></label>
                    <input type="email" class="form-control" name="email"
                    id="email" placeholder="E.g. juan.delacruz@email.com" value="{{ Auth::user()->email }}" disabled>
                  </div>
                </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-12">
                  <label for="address_street1" class="col-form-label"><strong>{{ __('Street Line 1') }}</strong></label>

                  <input id="address_street1" type="text" name="address_street1" class="form-control{{ $errors->has('address_street1') ? ' is-invalid' : '' }}" value="{{ $customer->address_street1 }}" required>

                  @if ($errors->has('address_street1'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('address_street1') }}</strong>
                      </span>
                  @endif
              </div>

               <div class="col-12">
                  <label for="address_street2" class="col-form-label"><strong>{{ __('Street Line 2') }}</strong></label>

                  <input id="address_street2" type="text" name="address_street2" class="form-control{{ $errors->has('address_street2') ? ' is-invalid' : '' }}" value="{{ $customer->address_street2 }}" >

                  @if ($errors->has('address_street2'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('address_street2') }}</strong>
                      </span>
                  @endif
              </div>

               <div class="col-4">
                  <label for="address_barangay" class="col-form-label"><strong>{{ __('Barangay') }}</strong></label>

                  <input id="address_barangay" type="text" name="address_barangay" class="form-control{{ $errors->has('address_barangay') ? ' is-invalid' : '' }}" value="{{ $customer->address_barangay }}" required>

                  @if ($errors->has('address_barangay'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('address_barangay') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="col-4">
                  <label for="address_mun_city" class="col-form-label"><strong>{{ __('City/Municipality') }}</strong></label>

                  <input id="address_mun_city" type="text" name="address_mun_city" class="form-control{{ $errors->has('address_mun_city') ? ' is-invalid' : '' }}" value="{{ $customer->address_mun_city }}" required>

                  @if ($errors->has('address_mun_city'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('address_mun_city') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="col-4">
                  <label for="address_province" class="col-form-label"><strong>{{ __('Province') }}</strong></label>

                  <input id="address_province" type="text" name="address_province" class="form-control{{ $errors->has('address_province') ? ' is-invalid' : '' }}" value="{{ $customer->address_province }}" required>

                  @if ($errors->has('address_mun_city'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('address_province') }}</strong>
                      </span>
                  @endif
              </div>
            </div>

            <hr>

            <div class="row py-3">
            <div class="d-flex">
              <img src="{{ $customer->photo }}" style="max-height: 120px">
               <div class="suroi-file form-group col-12">
                  <label for="photo"><strong>Upload Profile Picture</strong></label>
                  <input type="file" name="photo" id="photo" class="form-control-file">
                </div>
              </div>
            </div>

            <div class="form-group row mt-5 mx-0">
                <div class="">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create Profile') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
  </div>

</div>

@endsection

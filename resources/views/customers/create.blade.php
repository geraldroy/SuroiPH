@extends('layouts.app')


@section('content')
<div class="my-5 d-flex w-100 container site-content flex-column transaction">
  <div class="row w-100">
    <div class="col-lg-10 mx-auto">
        <form id="basic-info" class="container-fluid" style="padding-top: 60px; width: 100% !important;" method="POST" action="{{ route('customers.store') }}">
            @csrf
            <h1 class="h1 mb-4"><strong>Just a few more steps…</strong></h1>
            <h4 class="mb-4">Basic information</h4>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="transaction-surname"><strong> Surname </strong></label>
                  <input type="text" class="form-control" id="transaction-surname" placeholder="E.g. De La Cruz">
                </div>
                
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="transaction-firstname"><strong> First Name </strong></label>
                  <input type="text" class="form-control" id="transaction-firstname" placeholder="E.g. Juan">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="transaction-midname"><strong>Middle Name </strong></label>
                  <input type="text" class="form-control" id="transaction-midname" placeholder="E.g. Remedios">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <strong>Birthday</strong>
                <div class="row">
                  <div class="col-4">
                    <input type="number" class="form-control" id="transaction-day" placeholder="Day">
                  </div>
                  <div class="col-4">
                    <select class="form-control" id="transaction-month">
                      <option selected>Month</option>
                      <option >January</option>
                      <option >February</option>
                      <option >March</option>
                      <option >April</option>
                      <option >May</option>
                      <option >June</option>
                      <option >July</option>
                      <option >August</option>
                      <option >September</option>
                      <option >October</option>
                      <option >November</option>
                      <option >December</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <input type="number" class="form-control" id="transaction-year" placeholder="Year">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                      <strong>Sex</strong>
                      <select class="form-control" id="transaction-sex">
                        <option selected></option>
                        <option >Male</option>
                        <option >Female</option>
                        <option >Unspecified</option>
                      </select>
                    </div>
                    <div class="col-md-8">
                      <strong>Nationality</strong>
                      <div class="form-group">
                        <input type="text" class="form-control" id="transaction-nation" placeholder="E.g. Filipino">
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="transaction-mobile"><strong>Mobile Number </strong></label>
                    <input type="text" class="form-control" id="transaction-mobile" placeholder="E.g. +63 912 345 6789">
                  </div>
                </div>

                 <div class="col-6">
                  <div class="form-group">
                    <label for="transaction-email"><strong>Email address </strong></label>
                    <input type="email" class="form-control" id="transaction-email" placeholder="E.g. juan.delacruz@email.com">
                  </div>
                </div>

                <div class="suroi-file form-control-file">
                    <div class="btn btn-primary" onclick="$('#file-upload').click()">
                        Upload Profile Picture
                    </div>
                    <input type="file" name="profpic" id="file-upload" class="position-absolute d-none">
                </div>
            </div>

            <div class="form-group row mt-5">
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

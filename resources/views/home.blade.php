@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container h-100 pt-5 mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if($user->type == 'admin')
                @include('home.admin')
            @endif
            @if($user->type == 'agency')
                @include('home.agency')
            @endif
            @if($user->type == 'customer')
                @include('home.customer')
            @endif
        </div>
    </div>
</div>
@endsection

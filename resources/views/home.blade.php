@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container pt-5 mt-5 ">
    <div class="row justify-content-center m-0">
        <div class="site-content w-100">
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

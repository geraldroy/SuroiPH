@extends('layouts.app')


@section('content')
<div class="container py-5 mt-5 ">
    <div class="row justify-content-center m-0">
        <div class="site-content w-100">
            @if($user->type == 'admin')
                @section('title', 'Admin')
                @include('home.admin', ['userString' => $user->type])
            @endif
            @if($user->type == 'agency')
                @section('title', 'Agency')
                @include('home.agency', ['userString' => $user->type])
            @endif
            @if($user->type == 'customer')
                @section('title', 'Profile')
                @include('home.customer', ['userString' => $user->type])
            @endif
        </div>
    </div>
</div>
@endsection

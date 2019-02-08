@extends('layouts.app')

@section('content')

<div class="container h-100 pt-5 mt-5">
    <div class="row">
        <div class="col-9">
            <div style="border-bottom: 1px solid #B7B7B7; padding: 1.5em 0;">
                <h1>Review your trip details</h1>
                <h3>Trip Summary</h3>
                <h3>You are booking the travel package</h3>
                <div class="col-12 d-block d-lg-none"><hr></div>
            </div>
            <div class="column-sort" style="border-bottom: 1px solid #B7B7B7;">
                <div class="row mx-auto">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-4 image-holder rounded" style="background-image: url('http://lorempixel.com/150/150');">
                                <button class="limited d-inline-flex">LIMITED</button>
                                <a class="position-absolute favorite" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="pr-3">
                                    <span class="ad">AD</span><h3 class="h3">{{ $package->name }}</h3><span class="bolt rounded-circle"><i class="fas fa-bolt"></i></span>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                    <span class="suroi-agency suroi-agency-sm d-block">by Traveloko Agency<span class="star">STAR AGENCY</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-block d-lg-none"><hr></div>
                    <div class="col-3 col-lg-3 text-center text-lg-left">
                        <?php $star_rate = 3 ?>
                        <div class="d-flex review-star h4 w-75 justify-content-around">
                            @for ($i = 1; $i <= 5; $i++)
                            <i class="far fa-star @if ($i <= $star_rate) rate @endif"></i>
                            @endfor
                        </div>
                        <span class="suroi-agency suroi-agency-sm d-block">527 reviews</span>
                        <div class="featured mx-auto w-75">FEATURED IN SUROI TA </div>
                        <div class="reviews">
                            <p>"The price is right for everything the package offers." - Jonah Belgamo"</p>
                            Read other reviews <a href="#">here</a>.
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="mt-3">Traveling for <strong>9 days and 8 nights</strong> on the dates</h3>

            <form method="POST" action="{{ route('transactions.store') }}">
                @csrf

                <input id="package_id" name="package_id" type="hidden" value="{{ $package->id }}">
                <input id="customer_id" name="customer_id" type="hidden" value="{{ $customer->id }}">

                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-primary w-25 my-2">
                        {{ __('Complete') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

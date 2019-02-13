@extends('layouts.app')

@section('title', $package->name)

@section('content')

<?php
$slidecount = 9;
$promocount = 9;
?>

<div id="suroi-package-slideshow" class="carousel slide h-50  m" data-ride="carousel" data-interval="false" style="background-color: #5a5a5a">
    <div class="carousel-indicators position-absolute">
        @for ($i = 0; $i < $slidecount; $i++)
        <i data-target="#suroi-package-slideshow" data-slide-to="{{ $i }}" class="fas fa-circle @if ($i == 0) active @endif"></i>
        @endfor
    </div>
    <div class="carousel-inner mh-100">
        @for ($i = 0; $i < $slidecount; $i++)
        <div class="carousel-item @if ($i == 0) active @endif ">
            <img class="d-block " src="{{ asset('images/sample-card-bg.jpg') }}" >
        </div>
        @endfor

    </div>
    <a class="arrow carousel-control-prev ml-3" href="#suroi-package-slideshow" role="button" data-slide="prev">
        <i class="fas fa-angle-left carousel-control-prev-icon"></i>
    </a>
    <a class="arrow carousel-control-next mr-3" href="#suroi-package-slideshow" role="button" data-slide="next">
        <i class="fas fa-angle-right carousel-control-next-icon"></i>
    </a>
</div>

<div class="suroi-package site-content py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pr-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Philippines</a></li>
                        <li class="breadcrumb-item"><a href="#">Cebu</a></li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="h1">{{ $package->name }}</h1>
                        <span class="d-block suroi-agency">by Traveloko Agency <span class="star">STAR AGENCY</span></span>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-nowrap justify-content-around p-2">
                            @for ($i = 1; $i < 6; $i++)
                            <span class="review-star h4"><i class="far fa-star rate"></i></span>
                            @endfor
                        </div>
                    </div>
                </div>

                <p class="my-2">
                    {{ $package->description }}
                </p>

                <div class="tags">
                    <span class="font-weight-bold">INCLUDES 15 TAGS YOU SELECTED</span>
                    <div class="divider-heavy my-2"></div>

                    <div class="d-flex flex-wrap mb-2">
                        <button class="btn suroi-tag suroi-tag-selected">Paragliding</button>
                        <button class="btn suroi-tag suroi-tag-selected">Wildlife</button>
                        <button class="btn suroi-tag suroi-tag-selected">Beach</button>
                        <button class="btn suroi-tag suroi-tag-selected">Hiking</button>
                        <button class="btn suroi-tag suroi-tag-selected">Sunbathing</button>
                        <button class="btn suroi-tag suroi-tag-selected">Mountain</button>
                        <button class="btn suroi-tag suroi-tag-selected">Family-friendly</button>
                        <button class="btn suroi-tag suroi-tag-selected">All-terrain vehicle</button>
                        <button class="btn suroi-tag suroi-tag-selected">Zoo</button>
                        <button class="btn suroi-tag suroi-tag-selected">Ziplining</button>
                        <a class="show-all">And 33 other tags...</a>
                    </div>

                    <span class="font-weight-bold">DOES NOT INCLUDE 2 TAGS YOU SELECTED</span>
                    <div class="divider-heavy my-2"></div>

                    <div class="d-flex flex-wrap mb-2">
                        <button class="btn suroi-tag suroi-tag-not-selected">Lighthouse</button>
                        <button class="btn suroi-tag suroi-tag-not-selected">Scuba Diving</button>
                    </div>
                </div>

                <div class="h-100 main-package my-4">
                    <div id="overview" class="mt-4">
                        <h3> Overview </h3>
                        <div class="divider-heavy my-2"></div>
                        <div class="suroi-package-overview-icons d-flex flex-wrap align-self-center h2 justify-content-around my-4">
                            <i class="fas fa-plane"></i>
                            <i class="fas fa-hotel"></i>
                            <i class="fas fa-bus-alt"></i>
                            <i class="fas fa-people-carry"></i>
                            <i class="fas fa-user-tie"></i>
                        </div>

                        <ul>
                            @foreach (preg_split("/((\r?\n)|(\r\n?))/", $package->activities) as $line)
                            <li> {{ $line }} </li>
                            @endforeach
                        </ul>
                    </div>

                    <div id="itinerary" class="mt-5">
                        <h3> Itinerary </h3>
                        <div class="divider-heavy my-2"></div>

                        <div id="itinerary-day" class="carousel slide p-3" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner d-flex flex-wrap">
                                <div class="carousel-item active">
                                    <button type="button" class="btn btn-primary">Day 1</button>
                                    <button type="button" class="btn btn-primary">Day 2</button>
                                    <button type="button" class="btn btn-primary">Day 3</button>
                                    <button type="button" class="btn btn-primary">Day 4</button>
                                    <button type="button" class="btn btn-primary">Day 5</button>
                                    <button type="button" class="btn btn-primary">Day 6</button>
                                    <button type="button" class="btn btn-primary">Day 7</button>
                                    <button type="button" class="btn btn-primary">Day 8</button>
                                    <button type="button" class="btn btn-primary">Day 9</button>
                                </div>
                                <div class="carousel-item">
                                    <button type="button" class="btn btn-primary">Day 10</button>
                                    <button type="button" class="btn btn-primary">Day 11</button>
                                    <button type="button" class="btn btn-primary">Day 12</button>
                                </div>
                            </div>
                            <a class="carousel-control-next arrow color-suroi-green" href="#itinerary-day" role="button" data-slide="next">
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Time</th>
                                        <th scope="col" colspan="3">Activity</th>
                                        <th scope="col">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>7:30 am</td>
                                        <td colspan="3">Lorem ipsum</td>
                                        <td>Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>7:30 am</td>
                                        <td colspan="3">Lorem ipsum</td>
                                        <td>Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>7:30 am</td>
                                        <td colspan="3">Lorem ipsum</td>
                                        <td>Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>7:30 am</td>
                                        <td colspan="3">Lorem ipsum</td>
                                        <td>Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>7:30 am</td>
                                        <td colspan="3">Lorem ipsum</td>
                                        <td>Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>7:30 am</td>
                                        <td colspan="3">Lorem ipsum</td>
                                        <td>Lorem ipsum</td>
                                    </tr>
                                    <tr>
                                        <td>7:30 am</td>
                                        <td colspan="3">Lorem ipsum</td>
                                        <td>Lorem ipsum</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="price-breakdown" class="mt-5">
                        <h3> Price Breakdown </h3>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td colspan="3">Lorem ipsum dolor sit amet</td>
                                    <td>32,000</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td colspan="3">Lorem ipsum dolor sit amet</td>
                                    <td>32,000</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="3">Lorem ipsum dolor sit amet</td>
                                    <td>32,000</td>
                                </tr>
                                <div class="divider-heavy my-2"></div>
                                <tr>
                                    <th scope="row"> </th>
                                    <td colspan="3">Grand Total</td>
                                    <td>150,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="reviews" class="mt-3">
                        <h3> Reviews </h3>
                        <div class="divider-heavy my-2"></div>
                    </div>
                </div>
            </div>
        <div class="col-lg-4">
            <div class="container my-auto p-4 card">
                <span class="font-weight-bold"><span class="h2 font-weight-bold">P{{ $package->price }}</span> per person</span>
                <a href="{{ route('packages.book', $package) }}" class="btn btn-primary btn-lg w-100">BOOK</a>
                <div class="divider-heavy my-3"></div>

                <div class="card">
                    <span class="d-flex text-center justify-content-around align-middle">
                        <i class="far fa-calendar-alt icon my-auto" aria-hidden="true"></i>
                        <input type="textfield" name="before" value="25 Dec 2018" class="date-input text-center w-25" readonly>
                        <i class="fa fa-arrow-right my-auto"></i>
                        <input type="textfield" name="before" value="03 Jan 2019" class="date-input text-center w-25"  readonly></span></div><div class="d-inline-flex">
                        </span>
                    </div>

                    <div class="card">
                        <span class="d-flex text-center justify-content-around align-middle">
                            <i class="fas fa-user-friends icon my-auto"></i>
                            <select class="w-75">
                                <option>1 Traveller</option>
                                <option>2 Travellers</option>
                                <option>3 Travellers</option>
                                <option>4 Travellers</option>
                                <option selected="selected">5 Travellers</option>
                            </select>
                        </span>
                    </div>

                    <div class="price my-3">
                        <span class="font-weight-bold">Total price</span>
                        <span> P{{ $package->price }} x 5 Travellers = P{{ ($package->price * 5) }} </span>
                    </div>

                    <div class="divider-heavy mb-3"></div>
                    <span class="my-1"><i class="fas fa-bolt"></i> Instant processing <i class="far fa-question-circle"></i></span>
                    <span class="my-1"><i class="fas fa-clock"></i> Confirm up to 10 days before the trip <i class="far fa-question-circle"></i></span>

                    <div class="divider-heavy my-3"></div>

                    <div class="checkout">
                        <i class="fas fa-exclamation-circle"></i>
                        <h6>People have been checking this out.</h6>
                        <p>It’s been viewed 160 times and saved 43 times in the past week.</p>
                    </div>

                    <div class="divider-heavy my-3"></div>

                    <div class="feedback">
                        <i class="far fa-comments"></i>
                        Questions? Feedback?
                        We’re listening. Ask us anything here.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="suroi-card-slideshow pb-4">
    <div class="container my-auto p-3 position-relative">
        <div class="suroi-cards-4">
            <h3 class="text-left p-2" style="color: #414141">Can’t find what you want? We’ve got more suggestions.</h3>
            <div class="position-relative">
                <div id="suroi-search-promo" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 0; $i < $promocount; $i++)
                        <div class="carousel-item @if ($i == 0) active @endif ">
                            <div class="row">
                                @for ($j = 0; $j < 4; $j++)
                                <div class="col-md-6 col-lg">
                                    <div class="card">
                                        <div class="image-holder" style="background-image: url({{ asset('images/sample-card-bg.jpg') }});">
                                            <span class="align-bottom position-relative">Name</span>
                                            <a class="position-absolute favorite" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                <i class="far fa-heart"></i>
                                            </a>
                                        </div>
                                        <div class="card-text-holder">
                                            <p class="caption">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>

                                            <p><button type="button" class="btn btn-outline-primary btn-sm">P Over 9000</button></p>

                                            <?php $star_rate = 4 ?>
                                            <span class="d-inline-flex review-star">
                                                @for ($k = 1; $k < 6; $k++)
                                                <i class="far fa-star @if ($i <= $star_rate) rate @endif "></i>
                                                @endfor
                                            </span>

                                            <div class="row">
                                                <div class="col-md">
                                                    <span class="review-ct">146 reviews</span>
                                                </div>
                                                <div class="col-md">
                                                    <span class="review-ct text-right suroi-agency suroi-agency-sm">by Traveloko Agency</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor
                    </div>
                    <div class="carousel-indicators circles d-none d-lg-block ">
                        @for ($i = 0; $i < $promocount; $i++)
                        <i data-target="#suroi-search-promo" data-slide-to="{{ $i }}" class="fas fa-circle @if ($i == 0) active @endif"></i>
                        @endfor
                    </div>
                </div>

                <div class="d-none d-lg-block next-arrow" href="#suroi-search-promo" role="button" data-slide="next">
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
            <div class="show-all d-lg-none"><a href="#">Show All <i class="fas fa-angle-right"></i></a></div>
        </div>
    </div>
</div>


@endsection

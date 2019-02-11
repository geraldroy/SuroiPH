@extends('layouts.app')

@section('title', 'Home')

@section('content')

<?php
$headers = array(
  "Promos",
  "What's for you",
  "Trending activities",
  "Trending locations",
  "Trending packages",
  "Off-season packages",
  "What's New",
);

$paragraphs = array(
  "Looking for affordable trips over the weekend? We've got you covered.",
  "Hey user we've compiled a few suggestions for you that you may like based on the trips you've had.",
  "Whether it's your adrenaline junkie or couch potato, we've got quite a selection for you.",
  "Enjoy the beach, the mountains, or the night life with these trending locations.",
  "Shuffle through some of the packages which have seen an upsurge of bookings recently.",
  "Looking to escape the holiday rush? Don’t worry, these packages will always have an available booking for you.",
  "Be the first to experience these new packages from our highly-rated travel agencies."
);
?>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column suroi-landing mt-auto text-center parallax">
  <main role="main" class="inner cover text-white mt-auto">
    <div class="container">
      <h1 class="cover-heading shadow-text display-4">What's our next adventure?</h1>
      <form class="my-2 my-lg-0 d-inline-flex w-75" autocomplete="off" action="/search">
        <input class="form-control form-control-lg color-suroi-green text-center shadow-box" name="q" type="search" placeholder='Try "Batanes", or "paragliding"' aria-label="Search" value="" data-list="<%= @location_data_list %>">
        <div class="position-absolute align-middle color-suroi-green suroi-landing-searchico d-flex">
          <i class="fas fa-search"></i>
        </div>
      </form>
    </div>
  </main>

  <div class="mastfoot mt-auto text-white font-weight-bold">
    <div class="inner">
      <p>Or browse through our most popular destinations</p>
      <span class="suroi-landing-arrow"><i class="fas fa-angle-down"></i></p></span>
    </div>
  </div>
</div>

<!-- Main contents of Homepage -->
<div class="site-content py-3"> 
  @foreach(array_values($headers) as $i => $header)
  <div class="container my-3 p-4 position-relative">
      @if (!in_array($i, array(2,3)))
      <div class="suroi-cards-4">
          <h2>{{ $header }}</h2>
          <p>{{ $paragraphs[$i] }}</p>
          <div class="position-relative">
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

                              <?php $star_rate = 4; ?>
                              <span class="d-inline-flex review-star">
                                  @for ($k = 1; $k <= 5; $k++)
                                      <i class="far fa-star @if ($k <= $star_rate) rate @endif"></i>
                                  @endfor
                              </span>

                              <div class="row">
                                  <div class="col-md">
                                      <span class="review-ct">146 reviews</span>
                                  </div>
                                  <div class="col-md">
                                      <span class="review-ct text-right suroi-agency">by Traveloko Agency</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endfor
              </div>
              <div class="d-none d-lg-flex next-arrow ">
                  <i class="fas fa-angle-right m-auto"></i>
              </div>
          </div>
          <div class="show-all"><a href="#">Show All <i class="fas fa-angle-right"></i></a></div>
      </div>
      @else
      <div class="suroi-cards-2">
          <h2>{{ $header }}</h2>
          <p>{{ $paragraphs[$i] }}</p>
          <div class="position-relative">
              <div class="row">
                  @for ($j = 0; $j < 2; $j++)
                  <div class="col-md">
                      <div class="card">
                          <div class="image-holder" style="background-image: url({{ asset('images/sample-card-bg.jpg') }});">
                              <span class="display-4">Name</span>
                          </div>
                      </div>
                  </div>
                  @endfor
              </div>
          </div>
          <div class="show-all"><a href="#">Show All <i class="fas fa-angle-right"></i></a></div>
      </div>
      @endif
  </div>
  @endforeach
</div>

@endsection

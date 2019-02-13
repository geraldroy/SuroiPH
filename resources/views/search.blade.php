@extends('layouts.app')


@section('title', 'Search')

@section('content')

<nav class="navbar-expand-lg suroi-tag-bar" >
    <div class="suroi-tag-bar-indicator">
        <div class="row">
            <div class="col-5">
                <div class="d-inline-flex align-items-right">
                    <span class="suroi-landing-searchico"><i class="fas fa-search h5"></i></span>
                    <input class="form-control form-control-lg text-center ml-5 w-100" autocomplete="off" name="tag" type="search" placeholder='Click here to add or modify your tags' aria-label="Search" value="">
                </div>
            </div>
            <div class="col-7 mx-auto text-right">
                <i class="fas fa-angle-down h2"></i>
            </div>

        </div>
    </div>
</nav>

<div class="suroi-search-result">

    <div class="suroi-location" style="background-image: url({{ asset('images/sample-card-bg.jpg') }});"></div>
    <div class="suroi-location-text">
        <div class="container my-auto">
            <h2 class="display-4">Cebu, Philippines</h2>
            <div class="d-inline-flex"><i class="far fa-calendar-alt icon" aria-hidden="true"></i><span>
                <input type="textfield" name="before" value="25 Dec 2018" class="date-input text-center" readonly>
                <i class="fa fa-arrow-right"></i>
                <input type="textfield" name="before" value="03 Jan 2019" class="date-input text-center"  readonly></span></div><div class="d-inline-flex"><i class="fas fa-user-friends icon"></i>
                <span>
                    <select class="">
                        <option>1 Traveller</option>
                        <option>2 Travellers</option>
                        <option>3 Travellers</option>
                        <option>4 Travellers</option>
                        <option>5 Travellers</option>
                    </select>
                </span>
            </div>
        </div>
    </div>
</div>


<div class="suroi-card-slideshow">
    <div class="container my-auto p-3 position-relative">
        <div class="suroi-cards-4">
            <h2 class="text-center p-2">Explore these popular options,</h2>
            <div class="position-relative">

                <div id="suroi-search-promo" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @for ($i = 0; $i < 9; $i++)
                        <div class="carousel-item @if ($i == 0) active @endif ">
                            <div class="row">
                                @for ($j = 0; $j < 4; $j++)
                                <div class="col-md-6 col-lg">
                                    <div class="card">
                                        <div class="image-holder" style="background-image: url({{ asset('images/sample-card-bg.jpg') }} );">
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
                                                <i class="far fa-star @if ($k <= $star_rate) rate @endif "></i>
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
                    @for ($i = 0; $i < 9; $i++)
                        <i data-target="#suroi-search-promo" data-slide-to="{{ $i }}" class="fas fa-circle @if ($i == 0) active @endif"></i>
                    @endfor
                    </div>
                </div>

                <div class="d-none d-lg-block next-arrow" href="#suroi-search-promo" role="button" data-slide="next">
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
            <div class="show-all d-lg-none"><a href="#">Show All <i class="fas fa-angle-right"></i></a></div>
            <div class="suroi-search-recommend"><p>Or check out our recommended list for you <i class="fas fa-angle-down d-block"></i></p></div>
        </div>
    </div>
</div>


<div class="suroi-tag-search d-flex flex-column align-items-center">
    <h3 class="flex-item font-weight-bold my-auto"> Want more relevant results? Use tags. </h3>
    <div class="container flex-item mb-auto flex-item suroi-tag-area-indicator">
        <form class="mx-auto d-flex" >
        <div class="suroi-tag-area">
            <div class="container-fluid w-75 h-auto suroi-tag-selection mx-auto d-flex flex-column">
                @for ($i = 0; $i < 5; $i++)
                <div class="suroi-tag-category-area my-auto">
                    <div class="row">
                        <div class="col-2 d-flex">
                            <button class="btn suroi-tag m-auto">Category</button>
                        </div>
                        <div class="col-10">
                            <div class="suroi-tag-cat-tags d-flex flex-wrap ">
                                @for ($j = 1; $j < 11; $j++)
                                <button class="btn suroi-tag mb-2 ">Tag</button>
                                @endfor
                            </div>
                        </div>
                    </div>

                </div>
                @endfor
                <div class="row mt-auto">
                    <span class="col-2"><small><a href="#">? Selected</a></small></span>
                    <span class="suroi-tag-area-close col-8"><i class="fas fa-angle-up"></i></span>
                    <span class="col-2"><small><a href="#">Unselect All</a> | <a href="#">Select All</a></small></span>
                </div>
            </div>
        </div>
        <input class="form-control form-control-lg text-center" autocomplete="off" name="tag" type="search" placeholder='Click here to add or select your tags' aria-label="Search" value="">
        <span class="suroi-tag-area-searchico flex-item"><i class="fas fa-search"></i></span>
        </form>
    </div>
</div>

<div class="suroi-tag-results clearfix px-3 py-4 mb-3 container-fluid mw-100 site-content">
    <div class="float-lg-right col-lg-3">
        <div class="suroi-tag-sidebar w-100 my-auto">
            <div class="suroi-tag-filters">
                <div class="row">
                    <h6 class="col-8">Your filters</h6>
                    <span class="col-4 text-right"><a href="#">Clear All</a></span>
                </div>
                <div class="suroi-tags-selected d-flex flex-wrap mb-2">
                    <button class="btn suroi-tag">25 Dec - 1 Jan</button>
                    <button class="btn suroi-tag">5 Travellers</button>
                    <button class="btn suroi-tag">P18,000-P135,700</button>
                    <button class="btn suroi-tag-alt">Instant Book</button>
                </div>
                <span class="show-all mx-2"><a>More <i class="fas fa-angle-down"></i></a></span>
            </div>

            <div class="divider my-4"></div>

            <div class="suroi-price-person">
                <span class="d-inline-flex"><h6>Price per person</h6><span class="help h6 mx-2"><i class="far fa-question-circle"></i></span></span>
                <p>P18,000-P135,700</p>

                <div class="slidecontainer"></div>

                <div class="row my-1 d-flex justify-content-around">
                    <span class="slider-price" id="min-price">P18000</span>
                    <span class="slider-price" id="max-price">P135700</span>
                </div>
            </div>

            <div class="divider my-4"></div>

            <div class="suroi-sidebar-rating">
                <span class="d-inline-flex"><h6>Minimum Rating</h6></span>
                <p>Two stars, 15 available packages</p>

                <div class="d-flex flex-nowrap justify-content-center">
                    <span class="review-star h4"><i class="far fa-star rate"></i><p>1</p></span>
                    <span class="review-star h4"><i class="far fa-star rate"></i><p>2</p></span>
                    <span class="review-star h4"><i class="far fa-star"></i><p>3</p></span>
                    <span class="review-star h4"><i class="far fa-star"></i><p>4</p></span>
                    <span class="review-star h4"><i class="far fa-star"></i><p>5</p></span>
                </div>
            </div>
        </div>
    </div>
    <div class="float-lg-left col-lg-9">
        <div class="suroi-tag-header">
            <div class="row">
                <div class="col-4 col-lg-7">
                    Relevance
                </div>
                <div class="col-4 col-lg-2">
                    <i class="fa fa-arrow-down"></i> Price
                </div>
                <div class="col-4 col-lg-3">
                    Rating
                </div>
            </div>
        </div>

        <div class="alert alert-info alert-dismissible fade show my-3" role="alert">
            <div class="d-flex">
                <span class="flex-item h1 m-2"><i class="fas fa-chart-line"></i></span>
                <div class="flex-item mx-auto">
                    <strong class="alert-heading">Batanes is seeing a 452% upsurge of bookings this season.</strong>
                    <p>Prices are up. You can avoid the tourist rush by booking at a later date, or checking for packages in other places with your same specifications.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="sorted-find h-100 my-auto">
            @if (0)
            <h3 class="text-center my-5">No results found.</h3>
            @else
            <div class="column-sort">
                <div class="row mx-auto">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-4 image-holder rounded" style="background-image: url('http://lorempixel.com/180/150');">
                                <button class="limited d-inline-flex">LIMITED</button>
                                <a class="position-absolute favorite" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="pr-3">
                                    <span class="ad">AD</span><h3 class="h3">Island Hoping in Cebu</h3><span class="bolt rounded-circle d-inline-flex"><i class="fas fa-bolt m-auto"></i></span>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                    <span class="suroi-agency suroi-agency-sm d-block">by Traveloko Agency<span class="star">STAR AGENCY</span></span>
                                    <button class="btn btn-primary w-100 my-2">View Full Itenerary</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-block d-lg-none"><hr></div>
                    <div class="col-6 col-lg-2 p-auto text-center text-lg-left">
                        <a><button type="button" class="btn btn-outline-primary price-button mb-auto w-100">P2,500 per person</button></a>
                        <ul class="list-unstyled my-auto mx-auto">
                            <li> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</li>
                            <li> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</li>
                            <li> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</li>
                        </ul>
                    </div>

                    <div class="col-6 col-lg-3 text-center text-lg-left">
                        <?php $star_rate = 3 ?>
                        <div class="d-flex review-star h4 w-75 justify-content-around">
                            @for ($i = 1; $i <= 5; $i++)
                            <i class="far fa-star @if ($i <= $star_rate) rate @endif"></i>
                            @endfor
                        </div>
                        <span class="suroi-agency suroi-agency-sm d-block">527 reviews</span>
                        <div class="featured mx-auto w-75">FEATURED IN SUROI TA </div>
                        <div class="reviews">
                            <p>"It's all you'll ever need when you go to Batanes." - Nathan Bata</p>
                            <p>"The price is right for everything the package offers." - Jonah Belgamo"</p>
                            Read other reviews <a href="#">here</a>.
                        </div>
                    </div>
                </div>
            </div>

            <nav aria-label="" class="my-3">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link prev-next" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item prev-next">
                        <a class="page-link " href="#"><i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
            </nav>
            @endif
        </div>
    </div>
</div>

@endsection

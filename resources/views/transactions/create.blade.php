@extends('layouts.app')

@section('content')

    <div class="container py-5 mt-5 site-content">
        <div class="row">
            <div class="col-lg-8">
                <div id="tripsum" style="border-bottom: 1px solid #B7B7B7; padding: 1.5em 0;">
                    <h1><strong>Review your trip details</strong></h1>
                    <h3><strong>Trip Summary</strong></h3>
                    <h3>You are booking the travel package</h3>
                    <div class="col-12 d-block d-lg-none"><hr></div>
                </div>
                <div class="column-sort" style="border-bottom: 1px solid #B7B7B7;">
                    <div class="row mx-auto">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-4 image-holder rounded" style="background-image: url('http://lorempixel.com/150/150');">
                                    <button class="limited d-inline-flex">LIMITED</button>
                                    <a class="position-absolute favorite" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-heart"></i>
                                    </a>
                                </div>
                                <div class="col-md-8 pt-3 pt-md-0">
                                    <div class="pr-3">
                                        <span class="ad">AD</span><h3 class="h3">{{ $package->name }}</h3><span class="bolt rounded-circle d-inline-flex"><i class="fas fa-bolt m-auto"></i></span>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <span class="suroi-agency suroi-agency-sm d-block">by Traveloko Agency<span class="star">STAR AGENCY</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none"><hr></div>
                        <div class="col-md-3 col-lg-3 text-center text-lg-left">
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


                <span class="card d-inline-flex flex-row p-1">
                Dec 25   <i class="fa fa-arrow-right mx-2"></i> 3 Jan 2018
                </span>

                <h3 class="mt-3">With a company of</h3>

                <div class="d-inline-flex"><i class="fas fa-user-friends icon p-1"></i>
                    <span>                
                        5 Travellers
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Traveller</th>
                                <th scope="col">Surname</th>
                                <th scope="col">First name</th>
                                <th scope="col">Middle name</th>
                                <th scope="col">Birthday</th>
                            </tr>
                        </thead>
                        <tbody>
                             @for ($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>Laurente</td>
                                    <td>Rodney Jun</td>
                                    <td>Cruz</td>
                                    <td>15/06/1996</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>


                 <h3 class="mt-3">For a total of</h3>

                 <div class="d-flex">
                    <span>P55,000 x 5 Travellers</span>
                    <span class="ml-auto"><strong>P275,000</strong></span>
                </div>

                <hr>


                <form method="POST" action="{{ route('transactions.store') }}">
                    @csrf

                    <input id="package_id" name="package_id" type="hidden" value="{{ $package->id }}">
                    <input id="customer_id" name="customer_id" type="hidden" value="{{ $customer->id }}">

                    <div class="form-group row mb-0">
                        <button type="submit" class="btn btn-primary btn-lg px-5 my-2">
                            {{ __('Complete') }}
                        </button>
                    </div>
                </form>
            </div>

           <div class="col-lg-4">
                <div class="container my-auto py-4 px-5" >
                    <div class="p-3 card">

                        <div class="d-flex">
                            <ul class="list-ic vertical mx-auto">
                                <li>
                                    <span class="bullet">1</span>
                                    <a href="#basicinfo">Basic information</a>
                                </li>
                                <li>
                                    <span class="bullet">2</span>
                                    <a href="#paydeal">Payment deals</a>
                                </li>
                                <li>
                                    <span class="bullet">3</span>
                                    <a href="#tripsum">Trip summary</a>
                                </li>
                                 <li>
                                    <span class="bullet">4</span>
                                    <a href="#ttkim">Things to keep in mind</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="p-4 card mt-3">

                        <div class="d-flex w-100 flex-column px-1">
                            <div class="d-flex mx-auto">
                                <i class="far fa-lightbulb color-suroi-green mr-lg-4 mr-1 ml-2" style="font-size: 3.25em"></i>
                                <p class="ml-auto my-auto"> <strong>Itching to travel over the holiday rush?</strong></p>
                            </div>
                            <p class="py-3 mt-2 mb-0" style="font-size: 0.85em">
                                Check out our <strong class="color-suroi-green">off-season packages</strong> on the home page, featuring only the most beautiful travel destinations but without the human trafﬁc.
                            </p>
                        </div>
                    </div>




                    
                </div>
            </div>
        </div>
    </div>

@endsection

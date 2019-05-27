

@extends('layouts.app')

@section('content')
<div class="container pt-5 mt-5">
	<div class="row">
		<div class="col-lg-3 my-4 my-lg-0 d-flex flex-column">
			<div class="rounded-circle mx-auto" style="width:200px;height: 200px; background: black">
			</div>
			<button class="btn btn-primary mx-auto mt-3">SUBSCRIBE</button>
			<span class="mx-auto mt-3"> 300 views </span>
		</div>
		<div class="col-lg-9 d-flex flex-column">
			<div class="my-auto d-flex flex-column  text-center text-lg-left">
				<h1 class="d-inline-flex mx-auto mx-lg-0">
					<span>{{ $agency->name }}  </span>
					<span class="suroi-agency h6 my-auto d-flex"><span class="star pt-2">STAR AGENCY</span></span>
				</h1>
				
	            <div class="row">
	            	<div class="col-lg-8">
						<p class="mb-0">{{ $agency->description }}</p>

						<p class="mt-4"><i class="fas fa-map-marker-alt mr-3"></i> {{ $agency->address }}</p>
						<p><i class="fas fa-mobile-alt mr-3"></i> {{ $agency->mobile1}}, {{ $agency->mobile2}}</p>
						<p><i class="fas fa-phone mr-3"></i> {{ $agency->landline1}}, {{ $agency->landline2}}</p>
						<p><i class="fas fa-fax mr-3"></i> {{ $agency->fax }}</p>
					</div>
					 <div class="col-lg-4 text-center text-lg-left">
		                <?php $star_rate = 3 ?>
		                <div class="d-flex review-star h4 w-75 justify-content-around">
		                    @for ($i = 1; $i <= 5; $i++)
		                    <i class="far fa-star @if ($i <= $star_rate) rate @endif"></i>
		                    @endfor
		                </div>
		                <span class="suroi-agency suroi-agency-sm d-block">527 reviews</span>
		                <div class="reviews">
		                    <p>"It's all you'll ever need when you go to Batanes." - Nathan Bata</p>
		                    <p>"The price is right for everything the package offers." - Jonah Belgamo"</p>
		                    Read other reviews <a href="#">here</a>.
		                </div>
		            </div>

				</div>

			</div>
		</div>
	</div>
</div>

 <div class="suroi-card-slideshow">
        <div class="container py-5 position-relative">
        	<hr>
            <div class="suroi-cards-4">
                <div class="position-relative d-flex flex-column">
                    <div id="suroi-admin-location" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">
                            <?php $j = 0 ?>
                            @while ($j < count($packages))
                            <div class="carousel-item @if ($j == 0) active @endif ">
                                <div class="row">
                                    @while (true)
                                        <div class="col-md-6 col-lg-3">
                                            <div class="card">
                                                <div class="image-holder d-flex flex-column" style="background-image: url(@if($packages[$j]->photo1 == NULL)'http://lorempixel.com/400/400/'@else '{{ $packages[$j]->photo1 }}'@endif);">
                                                    <span class="align-bottom position-relative">{{ ucwords($packages[$j]->name) }}</span>

                                                    <div class="position-absolute ml-auto my-1" style="right:0.25em">
                                                        <a class="" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-pencil-alt" style="color: white"></i>
                                                        </a>
                                                         <a class="p-1" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                           <i class="fas fa-times" style="color: white"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                                <div class="card-text-holder">
                                                    <p class="caption" style="height: 70px">
                                                        {{ $packages[$j]->description }}
                                                    </p>
                                                    
                                                    <p class="card-text"><small class="text-muted">Children: <a href=#>Lorem</a>, <a href=#>Ipsum</a>, <a href=#>Lorem Ipsum</a> </small></p>
                                                    <a href="#" class="btn btn-outline-primary btn-sm">Add Child</a>
                                                </div>
                                            </div>
                                        </div>

                                        <?php $j = $j+1;
                                        
                                        if ($j >= count($packages) || 
                                            ($j % 4) == 0 ){
                                            break;
                                            //Do While Method
                                        }?>
                                    @endwhile
                                </div>
                            </div>
                            @endwhile
                        </div>
                        <div class="carousel-indicators circles d-none d-lg-block ">
                        @for ($i = 0; $i < (count($packages)/4); $i++)
                            <i data-target="#suroi-admin-location" data-slide-to="{{ $i }}" class="fas fa-circle @if ($i == 0) active @endif"></i>
                        @endfor
                        </div>
                    </div>

                    @if  (count($packages) > 4)
                        <div class="d-none d-lg-flex next-arrow my-auto" href="#suroi-admin-location" role="button" data-slide="next">
                            <i class="fas fa-angle-right m-auto"></i>
                        </div>
                    @endif
                </div>
                <div class="show-all d-lg-none"><a href="#">Show All <i class="fas fa-angle-right"></i></a></div>
            </div>
        </div>
  </div>

<div class="container">
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

@endsection
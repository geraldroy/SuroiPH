
@if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

@include('home.partials.nav_header', ['userType' => $userString] )

<div class="tab-content pt-4 w-100" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        @include('home.partials.dashboard', ['userType' => $userString])
    </div>
    <div class="tab-pane fade" id="nav-locations" role="tabpanel" aria-labelledby="nav-locations-tab">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createLocationModal">
            <i class="fas fa-plus"></i> Create New Location
        </button>

        <!-- Create Location Modal -->
        <div class="modal fade pt-5 mt-5" id="createLocationModal" tabindex="-1" role="dialog" aria-labelledby="createLocationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createLocationModalLabel">Create New Location</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('tags.store') }}" style="width: 100%!important;" enctype="multipart/form-data" >
                        @csrf
                        <div class="modal-body">

                            <input id="type" name="type" type="hidden" value="location">

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-7">
                                    <textarea id="description" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5"> </textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-3 col-form-label text-md-right">{{ __('Parent') }}</label>

                                <div class="col-md-7">
                                    <select id="parent" name="parent" class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" required>
                                        <option value="0">None</option>
                                        @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"> {{ ucwords($location->name) }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('parent'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('parent') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-3 col-form-label text-md-right">{{ __('Upload Photo') }}</label>
                                <div class="col-md-7">
                                       <input type="file" name="photo" id="photo" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create Location') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-columns">
            @foreach($locations as $location)
            <div class="card">
                <img class="card-img-top" src="@if($location->photo == NULL) http://lorempixel.com/400/400/ @else {{ $location->photo }} @endif" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ ucwords($location->name) }}</h5>
                    <p class="card-text">{{ $location->description }}</p>
                    <p class="card-text"><small class="text-muted">Children: <a href=#>Lorem</a>, <a href=#>Ipsum</a>, <a href=#>Lorem Ipsum</a> </small></p>
                    <a href="#" class="btn btn-success">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                    <a href="#" class="btn">Add Child</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="tab-pane fade" id="nav-tags" role="tabpanel" aria-labelledby="nav-tags-tab">...</div>
    <div class="tab-pane fade" id="nav-agencies" role="tabpanel" aria-labelledby="nav-agencies-tab">
        <!-- Agency tab --->
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 25%">Agency Name</th>
                        <th >Description</th>
                        <th>Packages</th>
                        <th style="width: 5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agencies as $key => $agency)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="#">{{ $agency->name }}</a></td>
                        <td>{{ $agency->description }}</td>
                        <td>{{ $agency->packages_count }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-success btn-sm">Edit</a>
                                <form action="#" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End of Agency tab --->
    </div>
    <div class="tab-pane fade" id="nav-customers" role="tabpanel" aria-labelledby="nav-customers-tab">
        <!-- Customers tab -->
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 25%">Customer Name</th>
                        <th >Email Address</th>
                        <th>Transactions</th>
                        <th style="width: 5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $key => $customer)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="#">{{ $customer->lastname.', '.$customer->firstname }}</a></td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->transactions_count }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-success btn-sm">Edit</a>
                                <form action="#" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End of Customers tab -->
    </div>
</div>

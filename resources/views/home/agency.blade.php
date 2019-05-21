
@if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif


@include('home.partials.nav_header', ['userType' => $userString] )

<div class="tab-content pt-4" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        @include('home.partials.dashboard', ['userType' => $userString])
    </div>
    <div class="tab-pane fade show" id="nav-packages" role="tabpanel" aria-labelledby="nav-packages-tab">
        <div class="d-flex">
            <a href="{{ route('packages.create') }}" class="p-2">Create New Package</a>
            <a href="#" class="ml-auto p-2">Create/Edit Profile</a>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 25%">Package Name</th>
                        <th >Description</th>
                        <th>Price</th>
                        <th style="width: 5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $key => $package)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="{{ route('packages.show', $package->id) }}">{{ $package->name }}</a></td>
                        <td>{{ $package->description }}</td>
                        <td>P{{ number_format($package->price, 2) }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('packages.edit',$package->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('packages.destroy', $package->id) }}" method="post">
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


    </div>
    <div class="tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-porders-tab">
        <h1>Orders</h1>

        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 25%">Package Name</th>
                        <th >Customer Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th style="width: 25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $key => $transaction)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $transaction->package_name }}</td>
                        <td>{{ $transaction->customer_name }}</td>
                        <td>P{{ number_format($transaction->package_price, 2) }}</td>
                        <td>status here</td>
                        <td>
                            <form method="POST" action="{{ action('TransactionController@agencyApproval', $transaction->id) }}" style="width: 100% !important">
                                @csrf
                                <label for="status" class="col-form-label text-md-right">{{ __('Status') }}</label>
                                <select id="status" name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                                    <option value="bookingAccepted">Accept Booking</option>
                                    <option value="bookingRejected">Reject Booking</option>
                                </select>

                                 <label for="remarks" class="col-form-label text-md-right">{{ __('Remarks') }}</label>
                                 <textarea id="remarks" name="remarks" class="form-control{{ $errors->has('remarks') ? ' is-invalid' : '' }}" rows="3" required> </textarea>

                                 <div class="d-flex mt-auto">
                                     <button type="submit" class="btn btn-primary w-100 pt-2 pb-1">
                                         <i class="fas fa-plus"></i> {{ __('Submit') }}
                                     </button>
                                 </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>

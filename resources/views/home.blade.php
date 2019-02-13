@extends('layouts.app')

@section('content')
<div class="container h-100 pt-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <!-- Agency --------------------------->
            @if($user->type == 1)
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dashboard</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-orders" role="tab" aria-controls="nav-orders" aria-selected="false">Orders</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-customers" role="tab" aria-controls="nav-contact" aria-selected="false">Customers</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-reports" role="tab" aria-controls="nav-contact" aria-selected="false">Reports</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-promotions" role="tab" aria-controls="nav-contact" aria-selected="false">Promotions</a>
                </div>
            </nav>
            <div class="tab-content pt-4" id="nav-tabContent">
                @if(session()->get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                            <a href="{{ route('packages.edit',$package->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
                    ...
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
            @endif
            <!-- End of Agency ----------------------->
            <!-- Customer ---------------------------->
            @if($user->type == 2)
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dashboard</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-history" role="tab" aria-controls="nav-history" aria-selected="false">History</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="false">Account Settings</a>
                </div>
            </nav>
            <div class="tab-content pt-4" id="nav-tabContent">
                @if(session()->get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="d-flex">
                        <a href="#" class="ml-auto p-2">Create/Edit Profile</a>
                    </div>

                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style>Package Name</th>
                                    <th>Agency</th>
                                    <th>Price</th>
                                    <th style="width: 5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <span class="badge badge-warning">Pending</span>
                                        @if ($order->status == 0)
                                        <a href="#">{{ $order->package_name }}</a>
                                        @endif
                                    </td>
                                    <td>{{ $order->agency_name }}</td>
                                    <td>P{{ number_format($order->package_price, 2) }}</td>
                                    <td>
                                        <form action="{{ route('transactions.destroy', $order->transaction_id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Cancel</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
                    ...
                </div>
                <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">...</div>
            </div>
            @endif
            <!-- End of Customer --------------------->
        </div>
    </div>
</div>
@endsection


@if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif


@include('home.partials.nav_header', ['userType' => $userString] )

<div class="tab-content pt-4" id="nav-tabContent">
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
                            @if ($order->status == 0)
                                <span class="badge badge-warning">Pending</span>
                            @elseif ($order->status == -1)
                                <span class="badge badge-danger">Cancelled</span>
                            @endif
                            <a href="#">{{ $order->package_name }}</a>
                        </td>
                        <td>{{ $order->agency_name }}</td>
                        <td>P{{ number_format($order->package_price, 2) }}</td>
                        <td>
                            <a href="{{ route('transactions.cancel', $order->transaction_id) }}" class="btn btn-danger btn-sm">Cancel</a>
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

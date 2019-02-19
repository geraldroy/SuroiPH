<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dashboard</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-locations" role="tab" aria-controls="nav-locations" aria-selected="false">Locations</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-tags" role="tab" aria-controls="nav-tags" aria-selected="false">Tags</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-agencies" role="tab" aria-controls="nav-agencies" aria-selected="false">Agencies</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-customers" role="tab" aria-controls="nav-customers" aria-selected="false">Customers</a>
    </div>
</nav>
<div class="tab-content pt-4" id="nav-tabContent">
    @if(session()->get('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        ...
    </div>
    <div class="tab-pane fade" id="nav-locations" role="tabpanel" aria-labelledby="nav-locations-tab">
        <div class="card-columns">
            @foreach($locations as $location)
            <div class="card">
                <img class="card-img-top" src="http://lorempixel.com/400/400/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ ucwords($location->name) }}</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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

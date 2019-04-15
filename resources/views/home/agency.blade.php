
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
        ...
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>

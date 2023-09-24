<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="card">
        <div class="card-header">
            <h3>Halo {{ $user->name }}</h3>
            <p>Your Product</p>
            <a href="{{route('user.product.create')}}" class="btn btn-fill-out btn-radius">Add Product</a>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($user->product as $data)
                    <div class="col-md-6 col-lg-3 col-sm-12">
                        @include('frontend.pages.user.product')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

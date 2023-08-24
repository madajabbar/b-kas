
<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
    <div class="row">
        <div class="col">
            <div class="card mb-3 mb-lg-0">
                <div class="card-header">
                    <h3>Address</h3>
                </div>
                <div class="card-body">
                    <address>
                        {{$user->userData->address}}
                    </address>
                    <p>{{$user->userData->city->name}}</p>
                    <a href="#" class="btn btn-fill-out">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>

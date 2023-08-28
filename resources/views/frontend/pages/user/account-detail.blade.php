<div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
    <div class="card">
        <div class="card-header">
            <h3>Account Details</h3>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label>Name
                            <span class="required">*</span></label>
                        <input required="" class="form-control" name="name" type="text"
                            value="{{ $user->name }}" />
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label>Full Name
                            <span class="required">*</span></label>
                        <input required="" class="form-control" name="fullname" type="text"
                            value="{{ $user->userData->fullname }}" />
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label>Email Address
                            <span class="required">*</span></label>
                        <input required="" class="form-control" name="email" type="email"
                            value="{{ $user->email }}" />
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label>Postal Code
                            <span class="required">*</span></label>
                        <input required="" class="form-control" name="postal_code" type="text"
                            value="{{ $user->userData->postal_code }}" />
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label>City
                            <span class="required">*</span></label>
                        <select class="form-control" name="city_id" id="city_id">
                            @foreach ($city as $data)
                                <option value="{{ $data->id }}"
                                    {{ $data->id == $user->userData->city_id ? 'selected' : '' }}>{{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label>Province
                            <span class="required">*</span></label>
                        <select class="form-control" name="province_id" id="province_id">
                            @foreach ($province as $data)
                                <option value="{{ $data->id }}"
                                    {{ $data->id == $user->userData->province_id ? 'selected' : '' }}>{{ $data->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group col-md-12 mb-3">
                        <label>Current Password
                            <span class="required">*</span></label>
                        <input required="" class="form-control" name="password"
                            type="password" />
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label>New Password
                            <span class="required">*</span></label>
                        <input required="" class="form-control" name="npassword"
                            type="password" />
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label>Confirm Password
                            <span class="required">*</span></label>
                        <input required="" class="form-control" name="cpassword"
                            type="password" />
                    </div> --}}
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

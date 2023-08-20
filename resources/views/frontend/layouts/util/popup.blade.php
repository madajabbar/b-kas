@if (Auth::check() == false)
    <div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                    </button>
                    <div class="login_register_wrap section">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3>Login</h3>
                                        </div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <input id="email" type="email" required=""
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" placeholder="Your Email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <input id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    required="" type="password" name="password"
                                                    placeholder="Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="login_footer form-group mb-3">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}
                                                            value="">
                                                        <label class="form-check-label"
                                                            for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a href="#">Forgot password?</a>
                                            </div>
                                            <div class="form-group mb-3">
                                                <button type="submit" class="btn btn-fill-out btn-block"
                                                    name="login">Log in</button>
                                            </div>
                                        </form>
                                        <div class="form-note text-center">Don't Have an Account? <a
                                                href="{{ route('register') }}">Sign up now</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

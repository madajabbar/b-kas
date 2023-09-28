<header class="header_wrap fixed-top header_with_topbar">
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="logo_light" src="{{ asset('frontend/Logo.png') }}" alt="logo" />
                    <img class="logo_dark" src="{{ asset('frontend/Logo.png') }}" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a class="nav-link active" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="dropdown">
                            <a class=" nav-link" href="{{route('product')}}" >Procucts</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Category</a>
                            <div class="dropdown-menu dropdown-reverse">
                                <ul id="categoryDropdown">
                                    <!-- Categories will be populated here -->
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i
                                class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form action="{{route('product')}}" method="GET">
                                <input type="text" placeholder="Search" class="form-control" id="search_input" name="product">
                                <button type="submit" class="search_icon"><i
                                        class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <div class="search_overlay"></div>
                        <div class="search_overlay"></div>
                    </li>
                    @auth
                        <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#"
                                data-bs-toggle="dropdown"><i class="linearicons-cart"></i><span
                                    class="cart_count">{{Auth::user()->cart->where('status', 'waiting')->count()}}</span></a>
                            <div class="cart_box dropdown-menu dropdown-menu-right">
                                @if (Auth::user()->cart->where('status', 'waiting')->count() > 0)
                                    <h5 class="mx-3">Keranjang kamu terisi nih</h5>
                                @endif
                                <div class="cart_footer">
                                    <p class="cart_buttons"><a href="{{route('cart.index')}}"
                                            class="btn btn-fill-line btn-radius view-cart">View Cart</a><a href="{{route('checkout.index')}}"
                                            class="btn btn-fill-out btn-radius checkout">Checkout</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{route('user')}}">
                                <i class="ti-user"></i>
                            </a>
                        </li>
                    @endauth
                    @if (!Auth::check())
                        <li>
                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#onload-popup">
                                Login
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>

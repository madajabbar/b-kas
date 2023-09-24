@extends('frontend.layouts.app')

@section('css')
@endsection

@section('content')
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            @if (Auth::user()->role->name == 'seller')
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard"
                                        role="tab" aria-controls="dashboard" aria-selected="false"><i
                                            class="ti-layout-grid2"></i>Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link {{Auth::user()->role->name == 'user' ? 'active':''}}" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail"
                                    role="tab" aria-controls="account-detail" aria-selected="false"><i
                                        class="ti-id-badge"></i>Account
                                    details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab"
                                    aria-controls="orders" aria-selected="false"><i
                                        class="ti-shopping-cart-full"></i>Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab"
                                    aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My
                                    Address</a>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="nav-link"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i
                                        class="ti-lock"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        @if (Auth::user()->role->name =='seller')
                        @include('frontend.pages.user.dashboard')
                        @endif
                        @include('frontend.pages.user.account-detail')
                        @include('frontend.pages.user.address')
                        @include('frontend.pages.user.orders')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
@endsection

@section('js')
@endsection

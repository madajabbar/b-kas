@extends('frontend.layouts.app')
@section('css')
@endsection

@section('content')
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:Void(0);" class="shorting_icon grid active"><i
                                                class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list"><i
                                                class="ti-layout-list-thumb"></i></a>
                                    </div>
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="">
                                                Showing
                                            </option>
                                            <option value="9">9</option>
                                            <option value="12">
                                                12
                                            </option>
                                            <option value="18">
                                                18
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container">
                        @foreach ($product as $data)
                            <div class="col-md-4 col-6">
                                @include('frontend.layouts.util.product')
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination mt-3 justify-content-center pagination_style1">
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @include('frontend.pages.product.sidebar')
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
@endsection


@section('js')
@endsection

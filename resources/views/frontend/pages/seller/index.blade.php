@extends('frontend.layouts.app')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="main_content">
        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <div class="product_img_box">
                                    <img id="product_img" src="{{ asset('frontend/assets/images/product_img1.jpg') }}"
                                        data-zoom-image="{{ asset('frontend/assets/images/product_zoom_img1.jpg') }}"
                                        alt="product_img1" />
                                    <a href="#" class="product_img_zoom" title="Zoom">
                                        <span class="linearicons-zoom-in"></span>
                                    </a>
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                                data-slides-to-scroll="1" data-infinite="false">
                                {{-- @foreach ($product->productImage as $image)
                                    <div class="item">
                                        <a href="#" class="product_gallery_item active"
                                            data-image="{{ asset('storage/'.$image->link) }}"
                                            data-zoom-image="{{ asset('storage/'.$image->link) }}">
                                            <img src="{{ asset('storage/'.$image->link) }}"
                                                alt="product_small_img1" />
                                        </a>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title">
                                    <a href="#">{{ $seller->name }}</a>
                                </h4>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width: 80%"></div>
                                    </div>
                                    <span class="rating_num">({{ count($seller->product) }})</span>
                                </div>
                                <div class="pr_desc">
                                    <p>
                                       Alamat <br> {{ $seller->userData->address }}
                                    </p>
                                </div>
                                <div class="product_sort_info">
                                    <ul>
                                            <li>
                                                <i class="linearicons-map-marker"></i>
                                                 {{$seller->userData->city->name}}
                                            </li>
                                            <li>
                                                <i class="linearicons-map-marker"></i>
                                                Provinsi {{$seller->userData->province->name}}
                                            </li>
                                    </ul>
                                </div>
                            </div>
                            <hr />
                                <div class="cart_extra">
                                    <div class="cart_btn">
                                        <a class="btn btn-fill-out btn-addtocart" href="{{ route('chat', $seller->id) }}">
                                            <i class="icon-chat"></i>
                                            Chat
                                        </a>
                                        <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                                    </div>
                                </div>
                            <hr />
                            <ul class="product-meta">
                                {{-- <li>SKU: <a href="#">BE45VGRT</a></li> --}}
                                {{-- <li>Category: <a href="#">{{ $product->category->name }}</a></li> --}}
                                {{-- <li>
                                    Tags: <a href="#" rel="tag">Cloth</a>,
                                    <a href="#" rel="tag">printed</a>
                                </li> --}}
                            </ul>

                            <div class="product_share">
                                <span>Share:</span>
                                <ul class="social_icons">
                                    <li>
                                        <a href="#"><i class="ion-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-googleplus"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-youtube-outline"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-instagram-outline"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="small_divider"></div>
                        <div class="divider"></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="heading_s1">
                            <h3>Related Products</h3>
                        </div>
                        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20"
                            data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                            @foreach ($seller->product as $data)
                                @include('frontend.pages.product.detail.related_products')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function storeProduct() {
                // Get the edited values from the content-editable fields
                var product_id = $('#product_id').val();
                var amount = $('#amount').val();

                // Prepare the data to send in the POST request
                var data = {
                    product_id: product_id,
                    amount: amount,
                };
                // Make the POST request to update the product
                $.ajax({
                    url: '{{ route('cart.store') }}',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        // Handle success, e.g., show a success message or redirect
                        console.log(response.success);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.success,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    },
                    error: function(response) {
                        // Handle error, e.g., show an error message
                        console.error(response.responseJSON.error);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: response.responseJSON.error,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            }

            $('.btn-addtocart').click(function() {
                storeProduct();
            });
        });
    </script>
@endsection

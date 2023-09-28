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
                                @if (count($product->productImage) > 0)
                                    <img id="product_img" src="{{ asset('storage/'.$product->productImage[0]->link) }}"
                                        data-zoom-image="{{ asset('storage/'.$product->productImage[0]->link) }}"
                                        alt="product_img1" />
                                @else
                                    <img id="product_img" src="{{ asset('frontend/assets/images/product_img1.jpg') }}"
                                        data-zoom-image="{{ asset('frontend/assets/images/product_zoom_img1.jpg') }}"
                                        alt="product_img1" />
                                    <a href="#" class="product_img_zoom" title="Zoom">
                                        <span class="linearicons-zoom-in"></span>
                                    </a>
                                @endif
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                                data-slides-to-scroll="1" data-infinite="false">
                                @foreach ($product->productImage as $image)
                                    <div class="item">
                                        <a href="#" class="product_gallery_item active"
                                            data-image="{{ asset('storage/'.$image->link) }}"
                                            data-zoom-image="{{ asset('storage/'.$image->link) }}">
                                            <img src="{{ asset('storage/'.$image->link) }}"
                                                alt="product_small_img1" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title">
                                    <a href="#">{{ $product->name }}</a>
                                </h4>
                                <div class="product_price">
                                    <span class="price">Rp. {{ $product->price }}</span>
                                    @if($product->discount != null)
                                    <del>Rp. {{$product->price+$product->discount}}</del>
                                    <div class="on_sale">
                                        <span>Discount Off</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width: 80%"></div>
                                    </div>
                                    <span class="rating_num">({{ $product->quantity }})</span>
                                </div>
                                <div class="pr_desc">
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                </div>
                                <div class="product_sort_info">
                                    <ul>
                                        <a href="{{route('seller',$product->user->ulid)}}">
                                            <li>
                                                <i class="linearicons-store"></i>
                                                Toko {{$product->user->name}}
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
                            <hr />
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <div class="cart_extra">
                                    <div class="cart-product-quantity">
                                        <div class="quantity">
                                            <input type="button" value="-" class="minus" />
                                            <input type="text" name="amount" value="1" title="Qty"
                                                id="amount" class="qty" size="4" />
                                            <input type="button" value="+" class="plus" />
                                        </div>
                                    </div>
                                    <div class="cart_btn">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}"
                                            id="product_id">
                                        <button class="btn btn-fill-out btn-addtocart" type="button">
                                            <i class="icon-basket-loaded"></i>
                                            Add to cart
                                        </button>

                                    </form>
                                </div>
                                <div class="mx-auto">
                                    <form action="{{route('product.like')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        @if ($product->review != null)
                                        <button class="add_wishlist" href="#"><i class="{{$product->review[0]->islike == true ? 'icon-heart':'icon-star'}}"></i></button>
                                        @else
                                        <button class="add_wishlist" href="#"><i class="icon-star"></i></button>
                                        @endif
                                    </form>

                                </div>
                                </div>
                            <hr />
                            <ul class="product-meta">
                                {{-- <li>SKU: <a href="#">BE45VGRT</a></li> --}}
                                <li>Category: <a href="#">{{ $product->category->name }}</a></li>
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
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                        href="#Description" role="tab" aria-controls="Description"
                                        aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews"
                                        role="tab" aria-controls="Reviews" aria-selected="false">Reviews {{count($product->review)}}</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel"
                                    aria-labelledby="Description-tab">
                                    <p>
                                        {{$product->description}}
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                    <div class="comments">
                                        <h5 class="product_tab_title">
                                            {{count($product->review)}} Review For
                                            <span>{{$product->name}}</span>
                                        </h5>
                                        <ul class="list_none comment_list mt-4">
                                            @foreach ($product->review as $review)
                                                <li>
                                                    <div class="comment_block">
                                                        <div class="rating_wrap">
                                                            <div class="rating">
                                                                <div class="product_rate"
                                                                    style="
                                                                    width: {{$review->rating}}%;
                                                                ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="customer_meta">
                                                            <span class="review_author">{{$review->user->name}}</span>
                                                            <span class="comment-date">{{\Carbon\Carbon::parse($review->created_at)->format('F, d Y')}}</span>
                                                        </p>
                                                        <div class="description">
                                                            <p>
                                                                {{$review->reviews}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="review_form field_form">
                                        <h5>Add a review</h5>
                                        <form class="row mt-3" action="{{route('product.comment')}}" method="POST">
                                            @csrf
                                            <div class="form-group col-12 mb-3">
                                                <div class="star_rating">
                                                    <span data-value="1"><i class="far fa-star"></i></span>
                                                    <span data-value="2"><i class="far fa-star"></i></span>
                                                    <span data-value="3"><i class="far fa-star"></i></span>
                                                    <span data-value="4"><i class="far fa-star"></i></span>
                                                    <span data-value="5"><i class="far fa-star"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-12 mb-3">
                                                <textarea required="required" placeholder="Your review *" class="form-control" name="review" rows="4"></textarea>
                                            </div>
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="form-group col-12 mb-3">
                                                <button type="submit" class="btn btn-fill-out" name="submit"
                                                    value="Submit">
                                                    Submit Review
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
                            @foreach ($product->category->product->random(8) as $data)
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

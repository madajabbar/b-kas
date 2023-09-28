@extends('frontend.layouts.app')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="main_content">
        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <button class="btn btn-fill-out my-2" type="button" data-bs-toggle="modal" data-bs-target="#image-popup">
                    <i class="icon-pencil"></i>
                    Add Image
                </button>
                @include('frontend.pages.user.pop-image')
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <div class="product_img_box">
                                @if (isset($product->productImage))
                                <img id="product_img" src="{{ asset('storage/' . $product->productImage[0]->link) }}"
                                    data-zoom-image="{{ asset('storage/' . $product->productImage[0]->link) }}"
                                    alt="product_img1" />
                                    @else
                                    <img id="product_img" src="{{ asset('frontend/assets/images/product_img1-2.jpg') }}"
                                        data-zoom-image="{{ asset('frontend/assets/images/product_img1-2.jpg') }}"
                                        alt="product_img1" />
                                @endif
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                            <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                                data-slides-to-scroll="1" data-infinite="false">
                                @if (isset($product->productImage))
                                    @foreach ($product->productImage as $image)
                                        <div class="item">
                                            <a href="#" class="product_gallery_item active"
                                                data-image="{{ asset('storage/' . $image->link) }}"
                                                data-zoom-image="{{ asset('storage/' . $image->link) }}">
                                                <img src="{{ asset('storage/' . $image->link) }}" alt="{{ $image->name }}" />
                                            </a>
                                        </div>
                                    @endforeach

                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form id="editProductForm">
                            <!-- Other form elements here -->
                            <div class="pr_detail">
                                <div class="product_description">
                                    <h4 class="product_title">
                                        <span>Name : </span>
                                        <span id="name"
                                            contenteditable="true">{{ $product->name ?? 'Product Name' }}</span>
                                        <sup><i class="icon-pencil"></i></sup>
                                    </h4>
                                    <div class="product_price">
                                        <span>Price (only input number) : Rp. </span>
                                        <span id="price" class="price"
                                            contenteditable="true">{{ $product->price ?? 0 }}</span>
                                        <sup><i class="icon-pencil"></i></sup>
                                        <div class="on_sale">
                                            <span>Discount (only input number) : Rp. </span>
                                            <span id="discount" contenteditable="true">{{ $product->discount ?? 0 }}</span>
                                            <sup><i class="icon-pencil"></i></sup>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width: 80%"></div>
                                        </div>
                                        <span class="rating_num">({{ $product->quantity ?? 0 }})</span>
                                    </div>
                                    <div class="pr_desc">
                                        <div class="row">
                                            <div class="col-11">
                                                <p id="description" contenteditable="true">
                                                    {{ $product->description ?? 'Product Description' }}
                                                </p>
                                            </div>
                                            <div class="col-1">
                                                <sup><i class="icon-pencil"></i></sup>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="cart_extra">
                                    <div class="cart-product-quantity">
                                        <div class="quantity">
                                            <input type="button" value="-" class="minus" />
                                            <input type="text" id="quantity" name="quantity"
                                                value="{{ $product->quantity ?? 0 }}" title="Qty" class="qty"
                                                size="4" />
                                            <input type="button" value="+" class="plus" />
                                        </div>
                                    </div>
                                    <div class="cart_btn">
                                        <button class="btn btn-fill-out btn-addtocart" type="button">
                                            <i class="icon-pencil"></i>
                                            {{ $product ? 'Edit' : 'Add' }}
                                        </button>
                                    </div>
                                </div>
                                <hr />
                                <ul class="product-meta">
                                    <li>Category:
                                        <select name="category_id" class="form-select" id="category_id">
                                            @foreach ($category as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $product ? ($product->category_id == $data->id ? 'selected' : '') : '' }}>
                                                    {{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>Condition:
                                        <select name="condition_id" class="form-select" id="condition_id">
                                            @foreach ($condition as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $product ? ($product->condition_id == $data->id ? 'selected' : '') : '' }}>
                                                    {{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>
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
                        </form>
                    </div>
                    <div class="col-6">
                        @if (isset($product->productImage))
                        @foreach ($product->productImage as $image)
                                <a class="btn btn-danger btn-sm mx-auto" href="{{route('user.product.image.delete',$image->ulid)}}">Hapus Gambar {{$loop->iteration}}</a>
                        @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <!-- END SECTION SHOP -->
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
                    var newName = $('#name').text();
                    var newPrice = $('#price').text();
                    var newDiscount = $('#discount').text();
                    var newDescription = $('#description').text();
                    var newQuantity = $('#quantity').val();
                    var newCategoryId = $('#category_id').val();
                    var newConditionId = $('#condition_id').val();
                    var productId = '{{ $product->id ?? null }}'
                    // Prepare the data to send in the POST request
                    var data = {
                        id: productId,
                        name: newName,
                        price: newPrice,
                        discount: newDiscount,
                        description: newDescription,
                        quantity: newQuantity,
                        user_id: {{ Auth::user()->id }},
                        condition_id: newConditionId,
                        category_id: newCategoryId,


                    };
                    // Make the POST request to update the product
                    $.ajax({
                        url: '{{ route('user.product') }}',
                        type: 'POST',
                        data: data,
                        success: function(response) {
                            // Handle success, e.g., show a success message or redirect
                            console.log(response);
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Product Has Changed',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        },
                        error: function(error) {
                            // Handle error, e.g., show an error message
                            console.error(error);
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Error',
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

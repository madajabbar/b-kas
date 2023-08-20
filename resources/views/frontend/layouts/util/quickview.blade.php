
<div class="ajax_quick_view">
	<div class="row">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
          <div class="product-image">
                <div class="product_img_box">
                    <img id="product_img" src='{{asset('frontend/assets/images/product_img1.jpg')}}' data-zoom-image="{{asset('frontend/assets/images/product_zoom_img1.jpg')}}" alt="product_img1" />
                </div>
                <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                    <div class="item">
                        <a href="#" class="product_gallery_item active" data-image="{{asset('frontend/assets/images/product_img1.jpg')}}" data-zoom-image="{{asset('frontend/assets/images/product_zoom_img1.jpg')}}">
                            <img src="{{asset('frontend/assets/images/product_small_img1.jpg')}}" alt="product_small_img1" />
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="product_gallery_item" data-image="{{asset('frontend/assets/images/product_img1-2.jpg')}}" data-zoom-image="{{asset('frontend/assets/images/product_zoom_img2.jpg')}}">
                            <img src="{{asset('frontend/assets/images/product_small_img2.jpg')}}" alt="product_small_img2" />
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="product_gallery_item" data-image="{{asset('frontend/assets/images/product_img1-3.jpg')}}" data-zoom-image="{{asset('frontend/assets/images/product_zoom_img3.jpg')}}">
                            <img src="{{asset('frontend/assets/images/product_small_img3.jpg')}}" alt="product_small_img3" />
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="product_gallery_item" data-image="{{asset('frontend/assets/images/product_img1-4.jpg')}}" data-zoom-image="{{asset('frontend/assets/images/product_zoom_img4.jpg')}}">
                            <img src="{{asset('frontend/assets/images/product_small_img4.jpg')}}" alt="product_small_img4" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="pr_detail">
                <div class="product_description">
                    <h4 class="product_title">
                        <form action="{{route('productDetail')}}" method="get">
                            <input type="hidden" name="product" value="{{$product->ulid}}">
                            <a type="submit">{{$product->name}}</a>
                        </form>
                    </h4>
                    <div class="product_price">
                        <span class="price">Rp. {{$product->price}}</span>
                        <del>$55.25</del>
                        <div class="on_sale">
                            <span>35% Off</span>
                        </div>
                    </div>
                    <div class="rating_wrap">
                            <div class="rating">
                                <div class="product_rate" style="width:80%"></div>
                            </div>
                            <span class="rating_num">({{$product->price}})</span>
                        </div>
                    <div class="pr_desc">
                        <p>{{$product->description}}</p>
                    </div>
                </div>

                <div class="product_share">
                    <span>Share:</span>
                    <ul class="social_icons">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

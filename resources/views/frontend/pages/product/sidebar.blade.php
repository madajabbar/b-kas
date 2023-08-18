<div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
    <div class="sidebar">
        <div class="widget">
            <h5 class="widget_title">Categories</h5>
            <ul class="widget_categories">
                @foreach ($category as $data)
                    <li>
                        <a href="#"><span class="categories_name">{{$data->name}}</span><span
                                class="categories_num">({{count($data->product)}})</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="widget">
            <h5 class="widget_title">Filter</h5>
            <div class="filter_price">
                <div id="price_filter" data-min="0" data-max="500" data-min-value="50"
                    data-max-value="300" data-price-sign="$"></div>
                <div class="price_range">
                    <span>Price:
                        <span id="flt_price"></span></span>
                    <input type="hidden" id="price_first" />
                    <input type="hidden" id="price_second" />
                </div>
            </div>
        </div>
        <div class="widget">
            <h5 class="widget_title">Condition</h5>
            <ul class="list_brand">
                @foreach ($condition as $data)
                    <li>
                        <div class="custome-checkbox">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="{{$data->name}}"
                                value="{{$data->name}}" />
                            <label class="form-check-label" for="{{$data->name}}"><span>{{$data->name}}</span></label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="widget">
            <div class="shop_banner">
                <div class="banner_img overlay_bg_20">
                    <img src="{{asset('frontend/assets/images/pembuka.png')}}" alt="sidebar_banner_img" />
                </div>
                <div class="shop_bn_content2 text_white">
                    <h5 class="text-uppercase shop_subtitle">
                        New Collection
                    </h5>
                    <h3 class="text-uppercase shop_title">
                        Sale 30% Off
                    </h3>
                    <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

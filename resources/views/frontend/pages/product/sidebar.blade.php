<div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
    <div class="sidebar">
        <div class="widget">
            <h5 class="widget_title">Categories</h5>
            <ul id="widgetCategory" class="widget_categories">
            </ul>
        </div>
        {{-- <div class="widget">
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
        </div> --}}
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

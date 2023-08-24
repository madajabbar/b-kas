<div class="product">
    <form id="{{ $data->ulid }}" action="{{ route('user.product') }}" method="get">
        <input type="hidden" name="product" value="{{ $data->ulid }}">
    </form>
    <div class="product_img">
        <a href="#">
            <img src="{{ asset('frontend/assets/images/product_img1.jpg') }}" alt="product_img1" />
        </a>
        <div class="product_action_box">
            <ul class="list_none pr_action_btn">
                <li class="add-to-cart">
                    <a href="javascript:void(0);" onclick="document.getElementById('{{ $data->ulid }}').submit()">
                        <i class="icon-pencil"></i>
                        Add To Cart</a>
                </li>
                <li>
                    <a href="{{route('quickview',$data->ulid)}}" class="popup-ajax"><i class="icon-magnifier-add"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="product_info">
        <h6 class="product_title">
            <a href="{{ route('productDetail') }}">{{ $data->name }}</a>
        </h6>
        <div class="product_price">
            <span class="price">Rp. {{ $data->price }}</span>
            <del>Rp. 1000</del>
            <div class="on_sale">
                <span>35% Off</span>
            </div>
        </div>
        <div class="rating_wrap">
            <div class="rating">
                <div class="product_rate" style="width: 80%"></div>
            </div>
            <span class="rating_num">{{ $data->quantity }}</span>
        </div>
        <div class="pr_desc">
            <p>
                {{ $data->description }}
            </p>
        </div>
    </div>
</div>

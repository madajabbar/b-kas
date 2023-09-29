<div class="product">
    <form id="{{ $data->ulid }}" action="{{ route('productDetail') }}" method="get">
        <input type="hidden" name="product" value="{{ $data->ulid }}">
    </form>
    <div class="product_img">
        <a href="{{route('productDetail',['product'=>$data->ulid])}}">
            @if (count($data->productImage) > 0)
            <img src="{{ asset('storage/'.$data->productImage[0]->link) }}" alt="product_img1" />
            @else
            <img src="{{ asset('frontend/assets/images/product_img1.jpg') }}" alt="product_img1" />
            @endif
        </a>
        <div class="product_action_box">
            <ul class="list_none pr_action_btn">
                <li class="add-to-cart">
                    <a href="javascript:void(0);" onclick="document.getElementById('{{ $data->ulid }}').submit()">
                        <i class="icon-basket-loaded"></i>
                        Add To Cart</a>
                </li>
                <li>
                    <a href="{{route('quickview',$data->ulid)}}" class="popup-ajax"><i class="icon-magnifier-add"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-heart"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="product_info">
        <h6 class="product_title">
            <form action="{{ route('productDetail') }}" method="get">
                <input type="hidden" name="product" value="{{$data->ulid}}">
                <button class="btn border-none bg-none" type="submit">{{ $data->name }}</button>
            </form>
        </h6>
        <div class="product_price">
            <span class="price">Rp. {{ $data->price }}</span>
        </div>
        <div class="rating_wrap">
            <div class="rating">
                <div class="product_rate" style="width: 80%"></div>
            </div>
            <span class="rating_num">{{ $data->quantity }}</span>
        </div>
    </div>
</div>

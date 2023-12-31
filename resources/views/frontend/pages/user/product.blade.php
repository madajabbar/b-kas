<div class="product">
    <form id="{{ $data->ulid }}" action="{{ route('user.product') }}" method="get">
        <input type="hidden" name="product" value="{{ $data->ulid }}">
    </form>
    <div class="product_img">
        <a href="#">
            @if (count($data->productImage)>0)
                <img src="{{ asset($data->productImage[0]->link) }}" alt="{{$data->productImage[0]->link}}" />
                @else
                <img src="{{ asset('frontend/assets/images/product_img1-2.jpg') }}" alt="" />

            @endif
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
            <form action="{{route('productDetail')}}" method="get">
                <input type="hidden" name="product" value="{{$data->ulid}}">
            <button class="btn btn-link" type="submit" >{{ $data->name }}</button>
            </form>
        </h6>
        <div class="product_price">
            <span class="price">Rp. {{ $data->price }}</span>
            <del>Rp. {{$data->price + $data->discount}}</del>
            <div class="on_sale">
                <span>{{$data->discount_status}}</span>
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

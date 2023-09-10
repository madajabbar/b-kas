@extends('frontend.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Store</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $data => $productList)
                                    <tr>
                                        <td>{{ $data }}</td>
                                        <td colspan="12" class="px-0">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-lg-6 col-md-6  text-start  text-md-end">
                                                    <button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
                                                </div>
                                                <div class="col-lg-6 col-md-6  text-start  text-md-end">
                                                    <form action="" method="post">
                                                        @foreach ($productList as $cart)
                                                            <input type="hidden" name="cart_id[]" value="{{$cart->id}}">
                                                        @endforeach
                                                    </form>
                                                    <button class="btn btn-line-fill btn-sm" type="submit">Checkout</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach ($productList as $cart)
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img
                                                        src="{{ asset('frontend/assets/images/product_img1.jpg') }}"
                                                        alt="product1"></a></td>
                                            <td class="product-thumbnail"><a href="#"><img
                                                        src="{{ asset('frontend/assets/images/product_img1.jpg') }}"
                                                        alt="product1"></a></td>
                                            <td class="product-name" data-title="Product"><a
                                                    href="#">{{ $cart->product->name }}</a></td>
                                            <td class="product-price" data-title="Price">{{ $cart->price }}</td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <input type="button" value="-" class="minus">
                                                    <input type="text" name="amount" value="{{ $cart->amount }}"
                                                        title="Qty" class="qty" size="4">
                                                    <input type="button" value="+" class="plus">
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">{{ $cart->total_payment }}</td>
                                            <td class="product-remove" data-title="Remove">
                                                <form action="{{route('cart.delete')}}" method="get">
                                                    <input type="hidden" name="id" value="{{$cart->id}}">
                                                    <button class="remove-product bg-transparent border-none" type="submit"><i
                                                            class="ti-close"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="heading_s1 mb-3">
                        <h6>Calculate Shipping</h6>
                    </div>
                    <form class="field_form shipping_calculator">
                        <div class="form-row">
                            <div class="form-group col-lg-12 mb-3">
                                <div class="custom_select">
                                    <select class="form-control">
                                        <option disabled value="{{ Auth::user()->userData->city->id }}" selected>
                                            {{ Auth::user()->userData->city->name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 mb-3">
                                <input required="required" placeholder="State / Country" class="form-control" name="name"
                                    type="text" value="{{ Auth::user()->userData->province->name }}" disabled>
                            </div>
                            <div class="form-group col-lg-6 mb-3">
                                <input required="required" placeholder="PostCode / ZIP" class="form-control" name="name"
                                    type="text" value="{{ Auth::user()->userData->postal_code }}" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12 mb-3">
                                <button class="btn btn-fill-line" type="submit">Update Totals</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Shipping</td>
                                        <td class="cart_total_amount">Rp. {{ $ongkir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Cart Subtotal</td>
                                        <td class="cart_total_amount">Rp. {{ $total->sum('total_payment') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount"><strong>$349.00</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-fill-out">Proceed To CheckOut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

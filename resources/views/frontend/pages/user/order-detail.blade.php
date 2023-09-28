@extends('frontend.layouts.app')

@section('content')
    <div class="section">
        <div class="container">
            <div class="order_review">
                <div class="heading_s1">
                    <h4>Your Orders From </h4>
                </div>
                <div class="table-responsive order_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetail as $orderDetail)
                                    <tr>
                                        <td>{{ $orderDetail->cart->product->name }} <span class="product-qty">x
                                                {{ $orderDetail->cart->amount }}</span></td>
                                        <td>Rp. {{ $orderDetail->cart->total_payment }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SubTotal</th>
                                <td class="product-subtotal">Rp. {{ $order->total_payment }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Method</th>
                                <td>
                                    <select class="form-select shipping-method" name="shipping"
                                        data-order-id={{ $order->id }} id="shipping"
                                        data-shipping-id={{ $order->orderDetail[0]->cart->product->user->userData->city_id }}>
                                        <option value="pos">POS</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Shipping Fee</th>
                                <td id="shipping-fee-{{ $order->id }}" class="shipping-fee">
                                    Rp. {{ $order->shipping_fee }}
                                </td>
                            </tr>
                            <tr>
                                <th>Shipping Service</th>
                                <td id="shipping-service-{{ $order->id }}">
                                    {{ $order->shipping_code }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Description</th>
                                <td id="shipping-description-{{ $order->id }}">
                                    {{ $order->shipping_description }}
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td class="product-subtotal" id="total_payment-{{ $order->id }}">Rp.
                                    {{ $order->total_payment }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                    <a href="{{$order->payment_link}}" target="_blank" class="btn btn-fill-out btn-block">Link Payment</a>
            </div>
        </div>
    </div>
@endsection

@extends('frontend.layouts.app')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="heading_s1">
                        <h4>Billing Details</h4>
                    </div>
                    <div class="card mb-3 mb-lg-0">
                        <div class="card-header">
                            <h3>Address</h3>
                        </div>
                        <div class="card-body">
                            <address>
                                {{ Auth::user()->userData->address }}
                            </address>
                            <p>{{ Auth::user()->userData->city->name }}</p>
                            <p>{{ Auth::user()->userData->province->name }}</p>
                            <a href="#" class="btn btn-fill-out">Edit</a>
                        </div>
                    </div>
                </div>
                @foreach ($orders as $data=>$order)
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1">
                                <h4>Your Orders From {{$data}}</h4>
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
                                        @foreach ($order as $orderItem)
                                            @foreach ($orderItem->orderDetail as $orderDetail)
                                                <tr>
                                                    <td>{{$orderDetail->cart->product->name}} <span class="product-qty">x {{$orderDetail->cart->amount}}</span></td>
                                                    <td>Rp. {{$orderDetail->cart->total_payment}}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal">Rp. {{$order[0]->total_payment}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Method</th>
                                            <td>
                                                <select class="form-select shipping-method" name="shipping" data-order-id={{$order[0]->id}} id="shipping" data-shipping-id={{$order[0]->orderDetail[0]->cart->product->user->userData->city_id}}>
                                                    <option value="pos">POS</option>
                                                    <option value="jne">JNE</option>
                                                    <option value="tiki">TIKI</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Fee</th>
                                            <td id="shipping-fee-{{$order[0]->id}}" class="shipping-fee">
                                                Rp. {{$order[0]->shipping_fee}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Service</th>
                                            <td id="shipping-service-{{$order[0]->id}}">
                                                {{$order[0]->shipping_code}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Description</th>
                                            <td id="shipping-description-{{$order[0]->id}}">
                                                {{$order[0]->shipping_description}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td class="product-subtotal" id="total_payment-{{$order[0]->id}}">Rp. {{$order[0]->total_payment}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <form action="{{route('checkout.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{$order[0]->id}}">
                                <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    const shippingElements = document.querySelectorAll('.shipping-method');
    shippingElements.forEach(element => {
        const shippingId = element.getAttribute('data-shipping-id');
        const orderId = element.getAttribute('data-order-id');
        element.addEventListener('change', function (event) {
            const selectedShipping = event.target.value;
            console.log(shippingId);
            // Assuming you have a URL for your RajaOngkir endpoint
            const rajaOngkirUrl = 'https://api.rajaongkir.com/starter/cost';

            // Replace 'your-api-key' with your actual RajaOngkir API key
            const apiKey = "{{env('RAJAONGKIR_API_KEY')}}";

            // Replace 'originCity' and 'destinationCity' with the appropriate values
            const originCity = {{Auth::user()->userData->city_id}};
            const destinationCity = shippingId;


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('rajaongkir') }}",
                data: {
                    user_city: destinationCity,
                    cart_city: originCity,
                    courier: selectedShipping,
                    order_id: orderId,
                },
                success: function(response) {
                    // Handle the response, e.g., update the total price or display a message
                    console.log(response.ongkir);
                    // Update the displayed total payment in the table cell
                    // const totalPaymentCell = document.getElementById('product-subtotal-'+response.id);
                    // totalPaymentCell.textContent = updatedTotalPayment;
                    const updatedTotalPayment = document.getElementById('total_payment-'+response.id);
                    const shippingFee = document.getElementById('shipping-fee-'+response.id);
                    const shippingService = document.getElementById('shipping-service-'+response.id);
                    const shippingDescription = document.getElementById('shipping-description-'+response.id);
                    shippingFee.textContent = "Rp. " + response.ongkir.shipping_fee;
                    shippingService.textContent = response.ongkir.shipping_code;
                    updatedTotalPayment.textContent = "Rp. " + response.ongkir.total_payment;
                    shippingDescription.textContent = response.ongkir.shipping_description;
                },
                error: function(xhr) {
                    console.log(xhr);

                }
            });
        });
    });
</script>

@endsection

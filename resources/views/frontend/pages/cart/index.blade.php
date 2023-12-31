@extends('frontend.layouts.app')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                                <div class="col-12  text-start  text-md-end">
                                                    <form action="{{ route('cart.checkout') }}" method="post">
                                                        @csrf
                                                        @foreach ($productList as $cart)
                                                            <input type="hidden" name="cart_id[]"
                                                                value="{{ $cart->id }}">
                                                        @endforeach
                                                        <button class="btn btn-line-fill btn-sm"
                                                            type="submit">Checkout</button>
                                                    </form>
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
                                            <td class="product-quantity" data-title="Quantity"
                                                data-cart-id="{{ $cart->id }}">
                                                <div class="quantity">
                                                    <input type="button" value="-" class="minus2">
                                                    <input id="product-amount-{{$cart->id}}" type="text" value="{{ $cart->amount }}"
                                                        title="Qty" class="qty" size="4">
                                                    <input type="button" value="+" class="plus2">
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total" id="product-subtotal-{{ $cart->id }}">{{ $cart->total_payment }}</td>
                                            <td class="product-remove" data-title="Remove">
                                                <form action="{{ route('cart.delete') }}" method="get">
                                                    <input type="hidden" name="id" value="{{ $cart->id }}">
                                                    <button class="remove-product bg-transparent border-none"
                                                        type="submit"><i class="ti-close"></i></button>
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
        </div>
    </div>
@endsection
@section('js')
    <script>
        const quantityElements = document.querySelectorAll('.product-quantity');
        quantityElements.forEach(quantityElement => {
            const minus2Button = quantityElement.querySelector('.minus2');
            const plus2Button = quantityElement.querySelector('.plus2');
            var qtyInput = quantityElement.querySelector('.qty');
            const cartId = quantityElement.getAttribute('data-cart-id');
            qtyInput.addEventListener('change', ()=>{
                console.log(event);
                updateCart(cartId,event.target.value)
            })
            minus2Button.addEventListener('click', () => {
                // Decrease the quantity by 1, but ensure it doesn't go below 1
                var currentQty = parseInt(qtyInput.value);
                if (currentQty > 1) {
                    currentQty--;
                    updateCart(cartId, currentQty);
                }
            });

            plus2Button.addEventListener('click', () => {
            var currentQty = parseInt(qtyInput.value);
                // Increase the quantity by 1
                currentQty++;
                updateCart(cartId, currentQty);
            });
        });

        function updateCart(cartId, newQty) {
            // Send an AJAX request to update the cart quantity
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('cart.update') }}",
                data: {
                    cart_id: cartId,
                    amount: newQty,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Handle the response, e.g., update the total price or display a message
                    const updatedTotalPayment = response.total_payment;

                    // Update the displayed total payment in the table cell
                    const totalPaymentCell = document.getElementById('product-subtotal-'+response.id);
                    document.getElementById('product-amount-'+response.id).value = response.amount;
                    totalPaymentCell.textContent = updatedTotalPayment;
                },
                error: function(xhr) {
                    console.log(xhr);
                    // Handle errors if the request fails
                    const qty = document.getElementById('product-amount-'+xhr.responseJSON.id);
                    const updateQty = xhr.responseJSON.error;
                    qty.value = updateQty;
                    currentQty = updateQty;
                }
            });
        }
    </script>
@endsection

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
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="heading_s1">
                            <h4>Your Orders</h4>
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
                                    <tr>
                                        <td>Blue Dress For Woman <span class="product-qty">x 2</span></td>
                                        <td>$90.00</td>
                                    </tr>
                                    <tr>
                                        <td>Lether Gray Tuxedo <span class="product-qty">x 1</span></td>
                                        <td>$55.00</td>
                                    </tr>
                                    <tr>
                                        <td>woman full sliv dress <span class="product-qty">x 3</span></td>
                                        <td>$204.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">$349.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal">$349.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment_method">
                            <div class="heading_s1">
                                <h4>Payment</h4>
                            </div>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option"
                                        id="exampleRadios3" value="option3" checked="">
                                    <label class="form-check-label" for="exampleRadios3">Direct Bank Transfer</label>
                                    <p data-method="option3" class="payment-text">There are many variations of passages of
                                        Lorem Ipsum available, but the majority have suffered alteration. </p>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios4"
                                        value="option4">
                                    <label class="form-check-label" for="exampleRadios4">Check Payment</label>
                                    <p data-method="option4" class="payment-text">Please send your cheque to Store Name,
                                        Store Street, Store Town, Store State / County, Store Postcode.</p>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5"
                                        value="option5">
                                    <label class="form-check-label" for="exampleRadios5">Paypal</label>
                                    <p data-method="option5" class="payment-text">Pay via PayPal; you can pay with your
                                        credit card if you don't have a PayPal account.</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-fill-out btn-block">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('frontend.layouts.app')

@section('content')
<div class="section">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center order_complete">
                	<i class="fas fa-x"></i>
                    <div class="heading_s1">
                  	<h3>Your order is Canceled!</h3>
                    </div>
                  	<p>Thank you for your order! Your order is Canceled</p>
                    <a href="{{route('product')}}" class="btn btn-fill-out">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

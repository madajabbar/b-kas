<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $data['order'] = Order::where('user_id', Auth::user()->id)->where('status')->get();
        return view('frontend.pages.checkout.index');
    }
}

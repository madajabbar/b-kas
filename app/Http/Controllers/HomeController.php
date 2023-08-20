<?php

namespace App\Http\Controllers;

use App\Http\Traits\DataTrait;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    use DataTrait;
    public function index()
    {
        $data['product'] = Product::all()->random(8);
        return view('frontend.home.index',$data);
    }
    public function product(){
        $data['condition']=$this->condition();
        $data['product'] = Product::orderBy('id','DESC')->paginate(9);
        return view('frontend.pages.product.index',$data);
    }
    public function productDetail(Request $request){
        $data['product'] = Product::ulid($request->product)->first();
        return view('frontend.pages.product.detail.index',$data);
    }
    // public function category(){
    //     $data['category'] = $this->category();
    //     return $data;
    // }
    public function getCategory(){
        $data = $this->category();
        return response()->json($data);
    }
    public function quickView($product){
        $data['product'] = Product::ulid($product)->first();
        return view('frontend.layouts.util.quickview', $data);
    }
}

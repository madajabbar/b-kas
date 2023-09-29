<?php

namespace App\Http\Controllers;

use App\Http\Traits\DataTrait;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $numberOfProductsToRetrieve = 8;
        $productCount = Product::count();

        if ($productCount >= $numberOfProductsToRetrieve) {
            // Retrieve 8 random products if there are at least 8 products in the database
            $data['product'] = Product::inRandomOrder()->take($numberOfProductsToRetrieve)->get();
        } else {
            // Handle the case when there are fewer than 8 products
            // You can choose to retrieve all products in this case or handle it differently
            $data['product'] = Product::all();
        }
        return view('frontend.home.index',$data);
    }
    public function product(Request $request){
        $data['condition']=$this->condition();

        $data['product'] = Product::orderBy('id','DESC')->paginate(9);
        if($request->category_id){
            $category_id = Category::where('slug',$request->category_id)->first();
            $data['product'] = Product::where('category_id',$category_id->id)->orderBy('id','DESC')->paginate(9);
        }
        if($request->product){
            $data['product'] = Product::where('name','like','%'.$request->product.'%')->orderBy('id','DESC')->paginate(9);
        }
        return view('frontend.pages.product.index',$data);
    }
    public function productDetail(Request $request){
        $data['product'] = Product::ulid($request->product)->first();
        return view('frontend.pages.product.detail.index',$data);
    }
    public function getCategory(){
        $data = $this->category();
        return response()->json($data);
    }
    public function quickView($product){
        $data['product'] = Product::ulid($product)->first();
        return view('frontend.layouts.util.quickview', $data);
    }
    public function seller($seller){
        $data['seller'] = User::where('ulid',$seller)->first();
        return view('frontend.pages.seller.index', $data);
    }
    public function comment(Request $request){
        $data = Review::updateOrCreate(
            ['id' => $request->id],
            [
                'user_id' => Auth::user()->id,
                'reviews' => $request->review,
                'product_id' => $request->product_id,
                'rating' => $request->rating,
            ]
        );
        return redirect()->back();
    }
    public function like(Request $request){
        $data = Review::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->first();
        if($data == null){
            $data = Review::create(
                [
                    'islike' => true,
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                ]
            );
        }
        if(isset($data->islike)){
            $data->islike = ($data->islike == false ? true:false);
            $data->save();
        }
        return redirect()->back();
    }
}

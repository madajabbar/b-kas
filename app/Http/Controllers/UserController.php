<?php

namespace App\Http\Controllers;

use App\Http\Traits\CreateTrait;
use App\Http\Traits\DataTrait;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ChatRoomUser;
use App\Models\City;
use App\Models\Condition;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Province;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use DataTrait;
    use CreateTrait;
    public function index()
    {
        $data['user'] = Auth::user() ? Auth::user() : User::where('role_id',1)->first();
        $data['city'] = City::all();
        $data['province'] = Province::all();
        $products = Cart::where('user_id', Auth::user()->id)
        ->with('product')->get()->groupBy(['user_id', 'product_id']);
        $data['orders'] = Order::orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
        $chatroom = ChatRoomUser::where('user_id', Auth::user()->id)->pluck('chat_room_id');
        $data['chat_rooms'] = ChatRoomUser::whereIn('chat_room_id', $chatroom)->where('user_id','!=',Auth::user()->id)->get();
        return view('frontend.pages.user.index',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'fullname' => 'required',
                'email' => 'required',
                'postal_code'=>'required',
                'address'=>'required',
                'city_id'=>'required',
                'province_id'=>'required',
            ]
        );
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->userData != null){
            $user->userData->fullname = $request->fullname;
            $user->userData->postal_code = $request->postal_code;
            $user->userData->address = $request->address;
            $user->userData->city_id = $request->city_id;
            $user->userData->province_id = $request->province_id;
            $user->userData->birth_date = $request->birth_date;
            $user->userData->birth_place = $request->birth_place;
            $user->userData->save();
        }
        else{
            UserData::create(
                [
                    'fullname' => $request->fullname,
                    'postal_code' => $request->postal_code,
                    'address' => $request->address,
                    'city_id' => $request->city_id,
                    'province_id' => $request->province_id,
                    'birth_place' => $request->birth_place,
                    'birth_date' => $request->birth_date,
                    'user_id' => $user->id,
                ]
            );
        }
        $user->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */

    public function showProduct(Request $request){
        $data['product'] = Product::ulid($request->product)->first();
        $data['category'] = Category::all();
        $data['condition'] = Condition::all();
        return view('frontend.pages.user.product-edit', $data);
    }

    public function addProduct(Request $request){
        $data['product'] = null;
        $data['category'] = Category::all();
        $data['condition'] = Condition::all();
        return view('frontend.pages.user.product-edit', $data);
    }

    public function storeProduct(Request $request){
        $this->createProduct($request);
        return redirect()->back();
    }

    public function storeImage(Request $request){
        $request->validate(
            [
                'image' => 'required',
            ]
        );
        $image = Image::make($request->image)->encode('webp', 100);
        $data = Product::find($request->id);
        $path = 'product/'.Str::slug($data->user->ulid).'/' . Str::slug($data->name) . '_' . count($data->productImage) + 1. . '.webp';
        Storage::put('public/' . $path, $image);
        $data = ProductImage::create(
            [
                'name' => $data->name."_".count($data->productImage)+1,
                'link' => $path,
                'product_id' => $data->id,
            ]
        );
        return redirect()->back();
    }

    public function deleteImage($ulid){
        $data = ProductImage::where('ulid',$ulid)->first()->delete();
        return redirect()->back();
    }

    public function order(Request $request){
        $data['order'] = Order::where('ulid', $request->ulid)->first();
        return view('frontend.pages.user.order-detail',$data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use GuzzleHttp\Client;


class CartController extends Controller
{
    public function index(){
        $data['carts'] = Cart::where('user_id',Auth::user()->id)->get();
        foreach($data['carts'] as $query) {
            if($query->amount == 0){
                Cart::find($query->id)->delete();
            }
        }
        $data['carts'] = Cart::where('user_id',Auth::user()->id)->get()->groupBy(function($query){
            return $query->product->user->name;
        });
        $data['total'] = Cart::where('user_id',Auth::user()->id)->get();
        $client = new Client();
        $response = $client->request('POST', 'https://api.rajaongkir.com/starter/cost', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'), // Replace with your RajaOngkir API key
            ],
            'form_params' => [
                'origin' => Auth::user()->userData->city_id, // City ID for the origin city
                'destination' => '114', // City ID for the destination city
                'weight' => 1, // Weight in grams
                'courier' => 'pos', // Specify the courier service (e.g., jne, tiki, pos)
            ],
        ]);

        $ongkir = json_decode($response->getBody(), true);
        // return $ongkir['rajaongkir']['results'][0]['costs'][0];
        $data['ongkir'] = $ongkir;
        return view('frontend.pages.cart.index',$data);
    }
    public function cart(Request $request){
        $data = Cart::where('user_id',Auth::user()->id)->query()->with(['product','product.user']);
        return DataTables::of($data);
    }
    public function delete(Request $request){
        $data = Cart::find($request->id)->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Traits\CreateTrait;
use App\Http\Traits\DataTrait;
use App\Models\Category;
use App\Models\City;
use App\Models\Condition;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('frontend.pages.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showProduct(Request $request){
        $data['product'] = Product::ulid($request->product)->first();
        $data['category'] = Category::all();
        $data['condition'] = Condition::all();
        return view('frontend.pages.user.product-edit', $data);
    }

    public function storeProduct(Request $request){
        $this->createProduct($request);
        return redirect()->back();
    }
}

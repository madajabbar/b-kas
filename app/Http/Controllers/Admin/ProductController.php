<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Product';
        $data['condition'] = $request->condition;
        $data['category'] = $request->category;
        $data['user'] = $request->user;
        return view('backend.product.index', $data);
    }
    public function datatable(Request $request)
    {
        $product = Product::query();
        if($request->category){
            $product->where('category_id', $request->category);
        }
        if($request->condition){
            $product->where('condition_id', $request->condition);
        }
        if($request->user){
            $product->where('user_id', $request->user);
        }
        $product->with(['condition','user','category']);
        return DataTables::of($product)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">View</a>';
                return $btn;
            })
            ->editColumn('description', function ($row) {
                return Str::limit($row->description, 20, '...');
            })
            ->editColumn('discount_status', function ($row) {
                return $row->discount_status ?? 'No Status';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function store(){
        
    }
}

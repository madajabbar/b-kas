<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
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
        $data['conditions'] = Condition::all();
        $data['categories'] = Category::all();
        $data['users'] = User::all();
        return view('backend.product.index', $data);
    }
    public function show($id){
        $data['title'] = 'Product Image';
        $data['image'] = ProductImage::where('product_id',$id)->get();
        $data['product_id'] = $id;
        return view('backend.product.image',$data);
    }
    public function datatable(Request $request)
    {
        $product = Product::query();
        if ($request->category) {
            $product->where('category_id', $request->category);
        }
        if ($request->condition) {
            $product->where('condition_id', $request->condition);
        }
        if ($request->user) {
            $product->where('user_id', $request->user);
        }
        $product->with(['condition', 'user', 'category']);
        return DataTables::of($product)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $form =  '<a  href="'.route('product.index').'/'.''.$row->id.'" class="btn btn-warning btn-sm mx-auto">View</a>';
                $form .= '<a  href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-success btn-sm mx-auto edit">Edit</a>';
                $form .= '<a  href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm mx-auto delete">Delete</a>';
                return $form;
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
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
            ]
        );

        $data = Product::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'discount' => $request->discount,
                'discount_status' => $request->discount_status,
                'category_id' => $request->category_id,
                'condition_id' => $request->condition_id,
                'condition_id' => $request->condition_id,
                'user_id' => $request->user_id,
            ]
        );

        return $data;
    }
    public function edit($id)
    {
        $data = Product::find($id);
        return $data;
    }
    public function destroy($id)
    {
        $data = Product::find($id)->delete();
        return $data;
    }
}

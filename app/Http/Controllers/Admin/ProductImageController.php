<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Image;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = ProductImage::query();
        if ($request->product_id) {
            $product->where('product_id', $request->product_id);
        }
        return DataTables::of($product)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $form = '<a  href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm mx-auto delete">Delete</a>';
                return $form;
            })
            ->editColumn('link', function ($row){
                $image = '<img src="'.asset($row->link).'" class="img-fluid">';
                return $image;
            })
            ->rawColumns(['action','link'])
            ->make(true);
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
        $request->validate(
            [
                'image' => 'required',
            ]
        );
        $image = Image::make($request->image)->encode('webp', 100);
        $data = Product::find($request->product_id);
        $imageName = Str::slug($data->name) . '_' . count($data->productImage) + 1. . '.webp';
        $path = 'product/'.Str::slug($data->user->ulid).'/';
        $request->image->move(public_path($path),$imageName);
        $data = ProductImage::create(
            [
                'name' => $data->name."_".count($data->productImage)+1,
                'link' => $path,$imageName,
                'product_id' => $data->id,
            ]
        );
        return $data;
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
        $data = ProductImage::find($id);
        return $data;
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
        $data = ProductImage::find($id)->delete();
        return $data;
    }
}

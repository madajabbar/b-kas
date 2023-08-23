<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;

class CategoryController extends Controller
{
    public function index(){
        $data['title'] = 'Category';
        return view('backend.category.index',$data);
    }
    public function datatable(Request $request){
        $user = Category::query();
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">View</a>';
                return $btn;
            })
            ->addColumn('product', function ($row) {
                return count($row->product);
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

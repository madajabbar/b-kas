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
                $form = '<form action="' . route('product.index') . '" method="get">';
                $form .= '<input type="hidden" name="category" value="'.$row->id.'" />';
                $form .= '<button type="submit" class="btn btn-warning btn-sm mx-auto">View</button>';
                $form .= '<a  href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-success btn-sm mx-auto edit">Edit</a>';
                $form .= '<a  href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm mx-auto delete">Delete</a>';
                $form .= '</form>';
                return $form;
            })
            ->addColumn('product', function ($row) {
                return count($row->product);
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
            ]
        );

        $data = Category::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'name' => $request->name,
                'description' => $request->description,
            ]
        );

        return $data;
    }
    public function edit($id){
        $data = Category::find($id);
        return $data;
    }
    public function destroy($id){
        $data = Category::find($id)->delete();
        return $data;
    }
}

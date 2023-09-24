<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ConditionController extends Controller
{
    public function index(){
        $data['title'] = 'Condition';
        return view('backend.condition.index',$data);
    }
    public function datatable(Request $request){
        $user = Condition::query();
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $form = '<form action="' . route('product.index') . '" method="get">';
                $form .= '<input type="hidden" name="condition" value="'.$row->id.'" />';
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
                'name' => 'required'
            ]
        );

        $data = Condition::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'name' => $request->name,
            ]
        );

        return $data;
    }
    public function edit($id){
        $data = Condition::find($id);
        return $data;
    }
    public function destroy($id){
        $data = Condition::find($id)->delete();
        return $data;
    }
}

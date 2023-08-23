<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\Datatables;


class UserController extends Controller
{
    public function index()
    {
        return view('backend.user.index');
    }
    public function datatable(Request $request)
    {
        $user = User::query()->where('role_id', Role::where('name', 'user')->first()->id);
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">View</a>';
                return $btn;
            })
            ->addColumn('transaction', function ($row) {
                return count($row->cart);
            })
            ->addColumn('product', function ($row) {
                return count($row->product);
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

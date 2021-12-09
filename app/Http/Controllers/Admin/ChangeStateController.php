<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangeStateController extends Controller
{
    public function changeViewStateUser(Request $request)
    {
        return response()->json([
            'view' => "" . view('Admin.Modal.User.ModalState')
                ->with('idTaiKhoan', $request->IDTaiKhoan)
        ]);
    }
    public function changeStateUser(Request $request)
    {
        DB::update('UPDATE taikhoan SET taikhoan.TinhTrang = ? WHERE 
        taikhoan.IDTaiKhoan = ? ', [$request->state, $request->IDTaiKhoan]);
        return response()->json([
            'view' => "" . view('Admin.Modal.User.Child.ElementState')
                ->with('state', $request->state)
        ]);
    }
}

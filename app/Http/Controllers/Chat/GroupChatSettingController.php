<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use App\Models\Tinnhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupChatSettingController extends Controller
{
    public function viewMember(Request $request)
    {
        $member = DB::select('SELECT DISTINCT IDTaiKhoan FROM tinnhan WHERE 
        IDNhomTinNhan = ? AND LoaiTinNhan = 0 ', [
            $request->IDNhomTinNhan,
        ]);
        $new = array();
        foreach ($member as $key => $value) {
            $new[$key] = Tinnhan::select('*', 'tinnhan.TinhTrang')
                ->where('tinnhan.IDTaiKhoan', '=', $value->IDTaiKhoan)
                ->where('tinnhan.LoaiTinNhan', '=', '0')
                ->where('tinnhan.IDNhomTinNhan', '=', $request->IDNhomTinNhan)
                ->join('taikhoan', 'tinnhan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                ->get()[0];
        }
        return response()->json([
            'view' => "" . view('Modal/ModalChat/MemberGroupChat')
                ->with('idNhomTinNhan', $request->IDNhomTinNhan)
                ->with('member', $new)
        ]);
    }
}

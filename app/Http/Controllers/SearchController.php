<?php

namespace App\Http\Controllers;

use App\Models\Moiquanhe;
use Illuminate\Http\Request;
use App\Models\Taikhoan;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $account =  DB::select("select * from moiquanhe inner join
        taikhoan on moiquanhe.IDBanBe = taikhoan.IDTaiKhoan 
        where concat(taikhoan.Ho,' ',taikhoan.Ten) 
        LIKE '%" . $request->Value . "%' LIMIT 8");
        $view = "";
        foreach ($account as $key => $value) {
            $user = DB::table('moiquanhe')->where('IDTaiKhoan', '=', $request->IDTaiKhoan)
                ->where('IDBanBe', '=', $value->IDBanBe)->get();
            $tinhTrang = -1;
            if (count($user) == 0) {
                $view = "";
            } else {
                $tinhTrang = $user[0]->TinhTrang;
                if ($tinhTrang == 3)
                    $view .= view('Modal.ModalHeader.Child.Friend')->with('value', $value);
                else
                    $view .= view('Modal.ModalHeader.Child.DataSearch')->with('value', $value);
            }
        }
        return response()->json([
            'view' => "" . $view
        ]);
    }
}

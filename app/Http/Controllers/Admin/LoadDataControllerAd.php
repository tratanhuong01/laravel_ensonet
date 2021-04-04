<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Query;
use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use Illuminate\Http\Request;

class LoadDataControllerAd extends Controller
{
    public function loadCategory(Request $request)
    {
        switch ($request->name) {
            case 'dashboard':
                return response()->json([
                    'view' => "" . view('Admin/Component/DanhMuc/TongQuan')
                ]);
                break;
            case 'user':
                return response()->json([
                    'view' => "" . view('Admin/Component/DanhMuc/NguoiDung')
                ]);
                break;
            case 'post':
                return response()->json([
                    'view' => "" . view('Admin/Component/DanhMuc/BaiViet')
                ]);
                break;
            case 'story':
                return response()->json([
                    'view' => "" . view('Admin/Component/DanhMuc/Story')
                ]);
                break;
            case 'reply':
                return response()->json([
                    'view' => "" . view('Admin/Component/DanhMuc/PhanHoi')
                ]);
                break;
            case 'category':
                return response()->json([
                    'view' => "" . view('Admin/Component/DanhMuc/DanhMuc')
                ]);
                break;
            default:
                break;
        }
    }
    public function loadViewDetail(Request $request)
    {
        switch ($request->name) {
            case 'dashboard':
                return response()->json([
                    'view' => "" . view('Admin/Modal/NguoiDung/ModalChiTiet')
                ]);
                break;
            case 'user':
                $user = Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)->get();
                return response()->json([
                    'view' => "" . view('Admin/Modal/NguoiDung/ModalChiTiet')
                        ->with('user', $user)
                ]);
                break;
            case 'post':
                return response()->json([
                    'view' => "" . view('Admin/Modal/NguoiDung/ModalChiTiet')
                ]);
                break;
            case 'story':
                return response()->json([
                    'view' => "" . view('Admin/Modal/NguoiDung/ModalChiTiet')
                ]);
                break;
            case 'reply':
                return response()->json([
                    'view' => "" . view('Admin/Modal/NguoiDung/ModalChiTiet')
                ]);
                break;
            case 'category':
                return response()->json([
                    'view' => "" . view('Admin/Modal/NguoiDung/ModalChiTiet')
                ]);
                break;
            default:
                break;
        }
    }
    public function pagination(Request $request)
    {
        switch ($request->name) {
            case 'user':
                $account = Query::getAllAccount(10, $request->index * 10);
                return response()->json([
                    'viewTable' => "" . view('Admin/Component/Child/BangNguoiDung')
                        ->with('account', $account)
                        ->with('index', $request->index * 10),
                    'viewPage' => "" . view('Admin/Component/Child/PhanTrangNguoiDung')
                        ->with('index', $request->index * 10)
                        ->with('num', count(Query::getAllAccountFull()) / 10)
                ]);
                break;

            default:
                # code...
                break;
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Admin\GeneralID;
use App\Http\Controllers\Controller;
use App\Models\Amthanh;
use App\Models\Camxuc;
use App\Models\Congty;
use App\Models\Diachi;
use App\Models\Loaithongbao;
use App\Models\Mautinnhan;
use App\Models\Nhandan;
use App\Models\Phongnen;
use App\Models\Quyenriengtu;
use App\Models\Truonghoc;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class InsertCategoryController extends Controller
{
    public function view(Request $request)
    {
        $modalAdd = Category::generalModalAdd();
        foreach ($modalAdd as $key => $value) {
            if ($value->type == $request->type) {
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Modal.ModalAdd')
                        ->with('modal', $value)
                        ->with('id', GeneralID::ID($value->table, $value->ID))
                ]);
                break;
            }
        }
    }
    public function insert(Request $request)
    {
        switch ($request->type) {
            case 'address':
                Diachi::add(
                    $request->IDDiaChi,
                    NULL,
                    $request->TenDiaChi
                );
                $data = Diachi::where('diachi.IDDiaChi', '=', $request->IDDiaChi)->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Child.Address')
                        ->with('item', $data[0])
                ]);
                break;
            case 'school':
                Truonghoc::add(
                    $request->IDTruongHoc,
                    NULL,
                    $request->TenTruongHoc,
                    $request->LoaiTruongHoc
                );
                $data = Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->IDTruongHoc)->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Child.School')
                        ->with('item', $data[0])
                ]);
                break;
            case 'company':
                Congty::add(
                    $request->IDCongTy,
                    NULL,
                    $request->TenCongTy
                );
                $data = Congty::where('congty.IDCongTy', '=', $request->IDCongTy)->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Child.Company')
                        ->with('item', $data[0])
                ]);
                break;
            case 'colorMessage':
                Mautinnhan::add(
                    $request->IDMauTinNhan,
                    $request->TenMau
                );
                $data = Mautinnhan::where('mautinnhan.IDMauTinNhan', '=', $request->IDMauTinNhan)->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Child.ColorMessage')
                        ->with('item', $data[0])
                ]);
                break;
            case 'sticker':
                Nhandan::add(
                    $request->IDNhanDan,
                    $request->NhomNhanDan,
                    $request->DongNhanDan,
                    $request->DuongDanNhanDan,
                    $request->Hang,
                    $request->Cot
                );
                $data = Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->IDNhanDan)->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Child.Sticker')
                        ->with('item', $data[0])
                ]);
                break;
            case 'feel':
                Camxuc::add(
                    $request->IDCamXuc,
                    $request->TenCamXuc,
                    $request->BieuTuong
                );
                $data = Camxuc::where('camxuc.IDCamXuc', '=', $request->IDCamXuc)->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Child.Feel')
                        ->with('item', $data[0])
                ]);
                break;
            case 'typeNotify':
                Loaithongbao::add(
                    $request->IDLoaiThongBao,
                    $request->TenLoaiThongBao,
                    $request->Loai
                );
                $data = Loaithongbao::where('loaithongbao.IDLoaiThongBao', '=', $request->IDLoaiThongBao)->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Child.TypeNotify')
                        ->with('item', $data[0])
                ]);
                break;
            case 'privacy':
                Quyenriengtu::add(
                    $request->IDQuyenRiengTu,
                    $request->TenQuyenRiengTu,
                );
                $data = Quyenriengtu::where('quyenriengtu.IDQuyenRiengTu', '=', $request->IDQuyenRiengTu)->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Child.Privacy')
                        ->with('item', $data[0])
                ]);
                break;
            case 'sound':
                if ($request->file('File')) {
                    Cloudder::uploadVideo($request->file('File'), null, ['folder' => 'Sound'], 'CommentImage.jpg');
                    $nameFile = Cloudder::getResult()['url'];
                    Amthanh::add(
                        $request->IDAmThanh,
                        $request->TenAmThanh,
                        $request->TacGia,
                        $nameFile
                    );
                    $data = Amthanh::where('amthanh.IDAmThanh', '=', $request->IDAmThanh)->get();
                    return response()->json([
                        'view' => "" . view('Admin.Component.DetailCategory.Child.Sound')
                            ->with('item', $data[0])
                    ]);
                }
                break;
            case 'background':
                Phongnen::add(
                    $request->IDPhongNen,
                    $request->DuongDanPN
                );
                $data = Phongnen::where('phongnen.IDPhongNen', '=', $request->IDPhongNen)->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Child.Background')
                        ->with('item', $data[0])
                ]);
                break;
            default:
                # code...
                break;
        }
    }
}

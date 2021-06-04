<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Admin\GeneralID;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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

class UpdateCategoryController extends Controller
{
    public function view(Request $request)
    {
        $modalAdd = Category::generalModalAdd();
        foreach ($modalAdd as $key => $value) {
            if ($value->type == $request->type) {
                $data = DB::select(
                    "SELECT * FROM $value->table WHERE $value->ID = ? ",
                    [$request->ID]
                )[0];
                $modalEdit = Category::generalModalEdit($data, $value->type);
                return response()->json([
                    'view' => "" . view('Admin.Component.DetailCategory.Modal.ModalEdit')
                        ->with('modal', $modalEdit)
                        ->with('id', $request->ID)
                ]);
                break;
            }
        }
    }
    public function update(Request $request)
    {
        switch ($request->type) {
            case 'address':
                Diachi::edit(
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
                Truonghoc::edit(
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
                Congty::edit(
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
                Mautinnhan::edit(
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
                Nhandan::edit(
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
                Camxuc::edit(
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
                Loaithongbao::edit(
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
                Quyenriengtu::edit(
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
                    $data = Amthanh::where('amthanh.IDAmThanh', '=', $request->IDAmThanh)->get();
                    $public_Id = explode('/', $data[0]->DuongDanAmThanh);
                    $public_Id = $public_Id[count($public_Id) - 2]  . "/" . $public_Id[count($public_Id) - 1];
                    Cloudder::destroy(
                        explode('.', $public_Id)[0],
                        array('invalidate' => TRUE, 'resource_type' => 'video')
                    );
                    Cloudder::delete(
                        explode('.', $public_Id)[0],
                        array('invalidate' => TRUE, 'resource_type' => 'video')
                    );
                    Cloudder::uploadVideo($request->file('File'), null, ['folder' => 'Sound'], 'sound');
                    $nameFile = Cloudder::getResult()['url'];
                    Amthanh::edit(
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
                } else {
                    $data = Amthanh::where('amthanh.IDAmThanh', '=', $request->IDAmThanh)->get();
                    Amthanh::edit(
                        $request->IDAmThanh,
                        $request->TenAmThanh,
                        $request->TacGia,
                        $data[0]->DuongDanAmThanh
                    );
                    $data = Amthanh::where('amthanh.IDAmThanh', '=', $request->IDAmThanh)->get();
                    return response()->json([
                        'view' => "" . view('Admin.Component.DetailCategory.Child.Sound')
                            ->with('item', $data[0])->render()
                    ]);
                }
                break;
            case 'background':
                Phongnen::edit(
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
                break;
        }
    }
}

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

class DeleteCategoryController extends Controller
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
                    'view' => "" . view('Admin.Component.DetailCategory.Modal.ModalDelete')
                        ->with('modal', $modalEdit)
                        ->with('id', GeneralID::GetID($value->table, $value->ID))
                ]);
                break;
            }
        }
    }
    public function delete(Request $request)
    {
        switch ($request->type) {
            case 'address':
                $data = Diachi::where('diachi.IDDiaChi', '=', $request->ID)->get();
                Diachi::where('diachi.IDDiaChi', '=', $request->ID)->detele();
                break;
            case 'school':
                $data = Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->ID)->get();
                Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->ID)->detele();
                break;
            case 'company':
                $data = Congty::where('congty.IDCongTy', '=', $request->ID)->get();
                Congty::where('congty.IDCongTy', '=', $request->ID)->detele();
                break;
            case 'colorMessage':
                $data = Mautinnhan::where('mautinnhan.IDMauTinNhan', '=', $request->ID)->get();
                Mautinnhan::where('mautinnhan.IDMauTinNhan', '=', $request->ID)->delete();
                break;
            case 'sticker':
                $data = Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->ID)->get();
                Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->ID)->delete();
                break;
            case 'feel':
                $data = Camxuc::where('camxuc.IDCamXuc', '=', $request->ID)->get();
                Camxuc::where('camxuc.IDCamXuc', '=', $request->ID)->delete();
                break;
            case 'typeNotify':
                $data = Loaithongbao::where('loaithongbao.IDLoaiThongBao', '=', $request->ID)->get();
                Loaithongbao::where('loaithongbao.IDLoaiThongBao', '=', $request->ID)->delete();
                break;
            case 'privacy':
                $data = Quyenriengtu::where('quyenriengtu.IDQuyenRiengTu', '=', $request->ID)->get();
                Quyenriengtu::where('quyenriengtu.IDQuyenRiengTu', '=', $request->ID)->delete();
                break;
            case 'sound':
                $data = Amthanh::where('amthanh.IDAmThanh', '=', $request->ID)->get();
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
                Amthanh::where('amthanh.IDAmThanh', '=', $request->ID)->delete();
                break;
            case 'background':
                Phongnen::where('phongnen.IDPhongNen', '=', $request->ID)->delete();
                break;
            default:
                # code...
                break;
        }
    }
}

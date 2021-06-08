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
use Illuminate\Support\Facades\File;
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
                        ->with('id', GeneralID::GetID($value->table, $value->ID, $request->ID))
                ]);
                break;
            }
        }
    }
    public function delete(Request $request)
    {
        switch ($request->type) {
            case 'address':
                Diachi::where('diachi.IDDiaChi', '=', $request->ID)->delete();
                break;
            case 'school':
                Truonghoc::where('truonghoc.IDTruongHoc', '=', $request->ID)->delete();
                break;
            case 'company':
                Congty::where('congty.IDCongTy', '=', $request->ID)->delete();
                break;
            case 'colorMessage':
                Mautinnhan::where('mautinnhan.IDMauTinNhan', '=', $request->ID)->delete();
                break;
            case 'sticker':
                $data = Nhandan::where('nhandan.IDNhanDan', '=', $request->ID)->get();
                $public_Id = explode('/', $data[0]->DuongDanNhanDan);
                $public_Id = $public_Id[count($public_Id) - 2]  . "/" . $public_Id[count($public_Id) - 1];
                Cloudder::destroyImage(explode('.', $public_Id)[0]);
                Cloudder::delete(explode('.', $public_Id)[0]);
                Nhandan::where('nhandan.IDNhanDan', '=', $request->ID)->delete();
                break;
            case 'feel':
                Camxuc::where('camxuc.IDCamXuc', '=', $request->ID)->delete();
                break;
            case 'typeNotify':
                Loaithongbao::where('loaithongbao.IDLoaiThongBao', '=', $request->ID)->delete();
                break;
            case 'privacy':
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
                $data = Phongnen::where('phongnen.IDPhongNen', '=', $request->ID)->get();
                if (File::exists(public_path($data[0]->DuongDanPN))) {
                    File::delete(public_path($data[0]->DuongDanPN));
                } else {
                    dd('File does not exists.');
                }
                $data = Phongnen::where('phongnen.IDPhongNen', '=', $request->ID)->delete();
                break;
        }
    }
}

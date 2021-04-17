<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\StringUtil;
use App\Models\Yeucaunguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RequestUserContrller extends Controller
{
    public function send(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $validator = Validator::make($request->all(), [
            'email' => array(
                'required',
                'email'
            ),
            'cmnd.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000',
        ], $messages = []);
        if ($validator->fails())
            redirect()->to('verify-user-identity')->send();
        else {
            if ($request->hasFile('cmnd')) {
                $files = $request->file('cmnd');
                $id = StringUtil::ID('yeucaunguoidung', 'IDYeuCauNguoiDung');
                $nameFile = '';
                foreach ($files as $key => $file) {
                    $nameFile .= 'img/RequestUserImage/' . StringUtil::createNameFileCMND($id, $key) . '.png' . '@';
                    $file->move(
                        public_path('img/RequestUserImage'),
                        StringUtil::createNameFileCMND($id, $key) . '.png'
                    );
                }
                Yeucaunguoidung::add(
                    $id,
                    $request->IDTaiKhoan,
                    $request->email,
                    $request->ngaySinh,
                    $nameFile,
                    $request->noiDung,
                    '0',
                    date("Y-m-d H:i:s"),
                    0
                );
                DB::update('UPDATE taikhoan SET taikhoan.TinhTrang = ? WHERE 
                taikhoan.IDTaiKhoan = ? ', ['5', $request->IDTaiKhoan]);
                return redirect()->to('verify-success')->send();
            }
        }
    }
}

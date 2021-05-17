<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Convert;
use App\Admin\Process;
use App\Http\Controllers\Controller;
use App\Models\Baidang;
use App\Models\Story;
use App\Models\Taikhoan;
use App\Models\Yeucaunguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        switch ($request->type) {
            case 'user':
                $querySearch = " ( concat(Ho,' ',Ten) 
                LIKE '%" . $request->valueSearch . "%' OR  IDTaiKhoan LIKE 
                '%" . $request->valueSearch . "%' OR Email LIKE '%" . $request->valueSearch . "% ' 
                OR SoDienThoai LIKE '%" . $request->valueSearch . "%' ) AND ";
                $query =  $querySearch . " taikhoan.LoaiTaiKhoan = 0 ";
                if (session()->has('abc'))
                    foreach (Session::get('abc') as $key => $values)
                        $query .= Convert::user($key, $values->Type) . " ";
                if (session()->has('def'))
                    foreach (Session::get('def') as $key => $values)
                        $query .= Convert::sort($values->Type) == -1 ? ""
                            : " ORDER BY " . $key . " " .  Convert::sort($values->Type) . " ";
                $account =  Taikhoan::whereRaw($query)
                    ->skip(0)->take(10)->get();
                $accountFull = Taikhoan::whereRaw($query)
                    ->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.Child.TableUser')
                        ->with('account', $account)
                        ->with('accountFull', $accountFull)
                        ->with('index', 0),
                ]);
                break;
            case 'post':
                $querySearch = " (baidang.IDBaiDang LIKE '%" . $request->valueSearch . "%' OR  baidang.IDTaiKhoan LIKE 
                    '%" . $request->valueSearch . "%' OR NoiDung LIKE '%" . $request->valueSearch . "%' ) 
                     AND ";
                $query =  $querySearch . " taikhoan.LoaiTaiKhoan = 0 ";
                if (session()->has('abc'))
                    foreach (Session::get('abc') as $key => $values)
                        $query .= Convert::user($key, $values->Type) . " ";
                if (session()->has('def'))
                    foreach (Session::get('def') as $key => $values)
                        $query .= Convert::sort($values->Type) == -1 ? ""
                            : " ORDER BY " . $key . " " .  Convert::sort($values->Type) . " ";
                $account =  Baidang::join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->whereRaw($query)
                    ->skip(0)->take(10)->get();
                $accountFull = Baidang::join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->whereRaw($query)
                    ->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.Child.TablePost')
                        ->with('post', $account)
                        ->with('postFull', $accountFull)
                        ->with('index', 0),
                ]);
                break;
            case 'story':
                $querySearch = " (concat(taikhoan.Ho,' ',taikhoan.Ten) LIKE '%" . $request->valueSearch
                    . "%' OR story.IDStory LIKE '%" . $request->valueSearch . "%' OR  
                story.IDTaiKhoan LIKE '%" . $request->valueSearch . "%' ) AND ";
                $query =  $querySearch . " taikhoan.LoaiTaiKhoan = 0 ";
                if (session()->has('abc'))
                    foreach (Session::get('abc') as $key => $values)
                        $query .= Convert::story($key, $values->Type) . " ";
                if (session()->has('def'))
                    foreach (Session::get('def') as $key => $values)
                        $query .= Convert::sort($values->Type) == -1 ? ""
                            : " ORDER BY " . $key . " " .  Convert::sort($values->Type) . " ";
                $account =  Story::join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->whereRaw($query)
                    ->skip(0)->take(10)->get();
                $accountFull = Story::join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->whereRaw($query)
                    ->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.Child.TableStory')
                        ->with('story', $account)
                        ->with('storyFull', $accountFull)
                        ->with('index', 0),
                ]);
                break;
            case 'reply':
                $querySearch = " (concat(taikhoan.Ho,' ',taikhoan.Ten) LIKE '%" . $request->valueSearch
                    . "%' OR yeucaunguoidung.IDYeuCauNguoiDung LIKE '%" . $request->valueSearch . "%' OR  
                    yeucaunguoidung.IDTaiKhoan LIKE '%" . $request->valueSearch . "%'  OR 
                    yeucaunguoidung.NoiDungYeuCau LIKE '%" . $request->valueSearch . "%'  OR 
                    yeucaunguoidung.EmailDangNhap LIKE '%" . $request->valueSearch . "%' ) AND ";
                $query =  $querySearch . " taikhoan.LoaiTaiKhoan = 0 ";
                if (session()->has('abc'))
                    foreach (Session::get('abc') as $key => $values)
                        $query .= Convert::story($key, $values->Type) . " ";
                if (session()->has('def'))
                    foreach (Session::get('def') as $key => $values)
                        $query .= Convert::sort($values->Type) == -1 ? ""
                            : " ORDER BY " . $key . " " .  Convert::sort($values->Type) . " ";
                $account =  Yeucaunguoidung::join('taikhoan', 'yeucaunguoidung.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->whereRaw($query)
                    ->skip(0)->take(10)->get();
                $accountFull = Yeucaunguoidung::join('taikhoan', 'yeucaunguoidung.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->whereRaw($query)
                    ->get();
                return response()->json([
                    'view' => "" . view('Admin.Component.Child.TableReply')
                        ->with('reply', $account)
                        ->with('replyFull', $accountFull)
                        ->with('index', 0),
                ]);
                break;
            default:
                # code...
                break;
        }
    }
}

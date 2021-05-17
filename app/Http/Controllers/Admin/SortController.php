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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SortController extends Controller
{
    public function sort(Request $request)
    {
        $json = json_decode($request->table);
        switch ($request->type) {
            case 'user':
                $value = Process::getNameOfSort($json, $request->valueSort);
                $data[$value[0]] = (object)[
                    'Name' => $request->valueSort,
                    'Type' => $request->dataSort,
                    'Query' => $value[0],
                    'FilterOrSort' => "Sort"
                ];
                Session::put('def', $data);
                $query = " taikhoan.LoaiTaiKhoan = 0 ";
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
                    'viewChild' => "" . view('Admin.Component.Category.Child.Data')
                        ->with('data', $data[$value[0]]),
                    'query' => $value[0],
                    'FilterOrSort' => "Sort"
                ]);
                break;
            case 'post':
                $value = Process::getNameOfSort($json, $request->valueSort);
                $data[$value[0]] = (object)[
                    'Name' => $request->valueSort,
                    'Type' => $request->dataSort,
                    'Query' => $value[0],
                    'FilterOrSort' => "Sort"
                ];
                Session::put('def', $data);
                $query = " taikhoan.LoaiTaiKhoan = 0 ";
                if (session()->has('abc'))
                    foreach (Session::get('abc') as $key => $values)
                        $query .= Convert::post($key, $values->Type) . " ";
                if (session()->has('def'))
                    foreach (Session::get('def') as $key => $values)
                        $query .= Convert::sort($values->Type) == -1 ? ""
                            : " ORDER BY " . $key . " " .  Convert::sort($values->Type) . " ";
                switch ($request->dataSort) {
                    case 'Số lượng bình luận':
                        $account =  DB::select('select * , (SELECT COUNT(*) FROM binhluan WHERE IDBaiDang = 
                            baidang.IDBaiDang) AS SoLuongBinhLuan from `baidang` inner join `taikhoan` 
                            on `baidang`.`IDTaiKhoan` = `taikhoan`.`IDTaiKhoan` where taikhoan.LoaiTaiKhoan 
                            = 0 ' . $query . " LIMIT 10 OFFSET 0");
                        $accountFull = DB::select('select * , (SELECT COUNT(*) FROM binhluan WHERE IDBaiDang = 
                            baidang.IDBaiDang) AS SoLuongBinhLuan from `baidang` inner join `taikhoan` 
                            on `baidang`.`IDTaiKhoan` = `taikhoan`.`IDTaiKhoan` where taikhoan.LoaiTaiKhoan 
                            = 0 ' . $query);
                        break;
                    case 'Số lượng cảm xúc':
                        $account =  DB::select('select * , (SELECT COUNT(*) FROM binhluan WHERE IDBaiDang = 
                            baidang.IDBaiDang) AS SoLuongBinhLuan from `baidang` inner join `taikhoan` 
                            on `baidang`.`IDTaiKhoan` = `taikhoan`.`IDTaiKhoan` where taikhoan.LoaiTaiKhoan 
                            = 0 ' . $query . " LIMIT 10 OFFSET 0");
                        $accountFull = DB::table('baidang')
                            ->select('select * , (SELECT COUNT(*) FROM binhluan WHERE IDBaiDang = 
                            baidang.IDBaiDang) SoLuongBinhLuan from `baidang` inner join `taikhoan` 
                            on `baidang`.`IDTaiKhoan` = `taikhoan`.`IDTaiKhoan` where taikhoan.LoaiTaiKhoan 
                            = 0 ' . $query)
                            ->get();
                        break;
                    default:
                        $account =  Baidang::join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                            ->whereRaw($query)
                            ->skip(0)->take(10)->get();
                        $accountFull = Baidang::join('taikhoan', 'baidang.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                            ->whereRaw($query)
                            ->get();
                        break;
                }
                return response()->json([
                    'view' => "" . view('Admin.Component.Child.TablePost')
                        ->with('post', $account)
                        ->with('postFull', $accountFull)
                        ->with('index', 0),
                    'viewChild' => "" . view('Admin.Component.Category.Child.Data')
                        ->with('data', $data[$value[0]]),
                    'query' => $value[0],
                    'FilterOrSort' => "Sort"
                ]);
                break;
            case 'story':
                $value = Process::getNameOfSort($json, $request->valueSort);
                $data[$value[0]] = (object)[
                    'Name' => $request->valueSort,
                    'Type' => $request->dataSort,
                    'Query' => $value[0],
                    'FilterOrSort' => "Sort"
                ];
                Session::put('def', $data);
                $query = " taikhoan.LoaiTaiKhoan = 0 ";
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
                    'viewChild' => "" . view('Admin.Component.Category.Child.Data')
                        ->with('data', $data[$value[0]]),
                    'query' => $value[0],
                    'FilterOrSort' => "Sort"
                ]);
                break;
            case 'reply':
                $value = Process::getNameOfSort($json, $request->valueSort);
                $data[$value[0]] = (object)[
                    'Name' => $request->valueSort,
                    'Type' => $request->dataSort,
                    'Query' => $value[0],
                    'FilterOrSort' => "Sort"
                ];
                Session::put('def', $data);
                $query = " taikhoan.LoaiTaiKhoan = 0 ";
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
                    'viewChild' => "" . view('Admin.Component.Category.Child.Data')
                        ->with('data', $data[$value[0]]),
                    'query' => $value[0],
                    'FilterOrSort' => "Sort"
                ]);
                break;
            default:
                # code...
                break;
        }
    }
}

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

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $json = json_decode($request->table);
        switch ($request->type) {
            case 'user':
                $value = Process::getNameOfFilter($json, $request->valueFilter);
                $data = Session::get('abc');
                if (count($value) != 0) {
                    if (session()->has('abc')) {
                        if (!isset($data[$value[0]])) {
                            $data[$value[0]] = (object)[
                                'Name' => $request->valueFilter,
                                'Type' => $request->dataFilter,
                                'Query' => $value[0],
                                'FilterOrSort' => "Filter"
                            ];
                            Session::put('abc', $data);
                        } else {
                            $data[$value[0]] = (object)[
                                'Name' => $request->valueFilter,
                                'Type' => $request->dataFilter,
                                'Query' => $value[0],
                                'FilterOrSort' => "Filter"
                            ];
                            Session::put('abc', $data);
                        }
                    } else {
                        $data[$value[0]] = (object)[
                            'Name' => $request->valueFilter,
                            'Type' => $request->dataFilter,
                            'Query' => $value[0],
                            'FilterOrSort' => "Filter"
                        ];
                        Session::put('abc', $data);
                    }
                }

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
                    'FilterOrSort' => "Filter"
                ]);
                break;
            case 'post':
                $value = Process::getNameOfFilter($json, $request->valueFilter);
                $data = Session::get('abc');
                if (count($value) != 0) {
                    if (session()->has('abc')) {
                        if (!isset($data[$value[0]])) {
                            $data[$value[0]] = (object)[
                                'Name' => $request->valueFilter,
                                'Type' => $request->dataFilter,
                                'Query' => $value[0],
                                'FilterOrSort' => "Filter"
                            ];
                            Session::put('abc', $data);
                        } else {
                            $data[$value[0]] = (object)[
                                'Name' => $request->valueFilter,
                                'Type' => $request->dataFilter,
                                'Query' => $value[0],
                                'FilterOrSort' => "Filter"
                            ];
                            Session::put('abc', $data);
                        }
                    } else {
                        $data[$value[0]] = (object)[
                            'Name' => $request->valueFilter,
                            'Type' => $request->dataFilter,
                            'Query' => $value[0],
                            'FilterOrSort' => "Filter"
                        ];
                        Session::put('abc', $data);
                    }
                }

                $query = " taikhoan.LoaiTaiKhoan = 0 ";
                if (session()->has('abc'))
                    foreach (Session::get('abc') as $key => $values)
                        $query .= Convert::post($key, $values->Type) . " ";
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
                    'viewChild' => "" . view('Admin.Component.Category.Child.Data')
                        ->with('data', $data[$value[0]]),
                    'query' => $value[0],
                    'FilterOrSort' => "Filter"
                ]);
                break;
            case 'story':
                $value = Process::getNameOfFilter($json, $request->valueFilter);
                $data = Session::get('abc');
                if (count($value) != 0) {
                    if (session()->has('abc')) {
                        if (!isset($data[$value[0]])) {
                            $data[$value[0]] = (object)[
                                'Name' => $request->valueFilter,
                                'Type' => $request->dataFilter,
                                'Query' => $value[0],
                                'FilterOrSort' => "Filter"
                            ];
                            Session::put('abc', $data);
                        } else {
                            $data[$value[0]] = (object)[
                                'Name' => $request->valueFilter,
                                'Type' => $request->dataFilter,
                                'Query' => $value[0],
                                'FilterOrSort' => "Filter"
                            ];
                            Session::put('abc', $data);
                        }
                    } else {
                        $data[$value[0]] = (object)[
                            'Name' => $request->valueFilter,
                            'Type' => $request->dataFilter,
                            'Query' => $value[0],
                            'FilterOrSort' => "Filter"
                        ];
                        Session::put('abc', $data);
                    }
                }
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
                $value = Process::getNameOfFilter($json, $request->valueFilter);
                $data = Session::get('abc');
                if (count($value) != 0) {
                    if (session()->has('abc')) {
                        if (!isset($data[$value[0]])) {
                            $data[$value[0]] = (object)[
                                'Name' => $request->valueFilter,
                                'Type' => $request->dataFilter,
                                'Query' => $value[0],
                                'FilterOrSort' => "Filter"
                            ];
                            Session::put('abc', $data);
                        } else {
                            $data[$value[0]] = (object)[
                                'Name' => $request->valueFilter,
                                'Type' => $request->dataFilter,
                                'Query' => $value[0],
                                'FilterOrSort' => "Filter"
                            ];
                            Session::put('abc', $data);
                        }
                    } else {
                        $data[$value[0]] = (object)[
                            'Name' => $request->valueFilter,
                            'Type' => $request->dataFilter,
                            'Query' => $value[0],
                            'FilterOrSort' => "Filter"
                        ];
                        Session::put('abc', $data);
                    }
                }
                $query = " taikhoan.LoaiTaiKhoan = 0 ";
                if (session()->has('abc'))
                    foreach (Session::get('abc') as $key => $values)
                        $query .= Convert::reply($key, $values->Type) . " ";
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

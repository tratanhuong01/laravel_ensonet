<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Convert;
use App\Admin\Process;
use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
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
            default:
                # code...
                break;
        }
    }
}

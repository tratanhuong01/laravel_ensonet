<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
        try {
            DB::update('UPDATE moiquanhe SET moiquanhe.TheoDoi = ? WHERE moiquanhe.IDTaiKhoan = ? 
            AND moiquanhe.IDBanBe = ? ', [$request->UserMain, $request->UserOther]);
        } catch (Exception $e) {
            $e->Error;
        }
    }
}

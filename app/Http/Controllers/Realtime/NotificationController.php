<?php

namespace App\Http\Controllers\Realtime;

use App\Http\Controllers\Controller;
use App\Models\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    public function notify()
    {
        return view('Component/Child/SoLuongThongBao')
            ->with('num', Notify::countNotify(Session::get('user')[0]->IDTaiKhoan));
    }
    public function moreNotify()
    {
    }
}

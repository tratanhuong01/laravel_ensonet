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
        $notify = Notify::getNotify(Session::get('user')[0]->IDTaiKhoan);

        return response()->json([
            'view' => "" . view('Component.Notify.Notify')->with('value', $notify[0]),
            'num' => "" . view('Component.Child.NumberNotify')
                ->with('num', Notify::countNotify(Session::get('user')[0]->IDTaiKhoan, 0))
        ]);
    }
    public function moreNotify()
    {
    }
}

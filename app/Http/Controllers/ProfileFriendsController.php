<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Functions;

class ProfileFriendsController extends Controller
{
    public function view(Request $request)
    {
        $user = Session::get('user');
        $data = Functions::getListFriendsUser($request->IDView);
        return view('Component\GioiThieu\BanBe')->with('data', $data);
    }
}

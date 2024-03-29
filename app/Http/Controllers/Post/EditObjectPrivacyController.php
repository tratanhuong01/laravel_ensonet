<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditObjectPrivacyController extends Controller
{
    public function edit(Request $request)
    {
        DB::update('UPDATE baidang SET baidang.IDQuyenRiengTu = ? 
        WHERE baidang.IDBaiDang = ? ', [$request->IDQuyenRiengTu, $request->IDBaiDang]);
        return view('Component\Post\PrivacyPost')->with('idQuyenRiengTu', $request->IDQuyenRiengTu);
    }
    public function view(Request $request)
    {
        return view('Modal\ModalPrivacy\Privacy');
    }
}

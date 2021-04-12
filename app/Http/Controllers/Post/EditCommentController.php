<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Baidang;
use App\Models\Binhluan;
use App\Models\Process;
use App\Models\Taikhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class EditCommentController extends Controller
{
    public function editView(Request $request)
    {
        switch ($request->type) {
            case '0':
                $comment = Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
                    ->join('taikhoan', 'binhluan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->get();
                return response()->json([
                    'view' => "" . view('Component/Comment/EditComment')
                        ->with('comment', $comment[0])
                        ->with('idBaiDang', $request->IDBaiDang)
                        ->with('anhDaiDien', $comment[0]->AnhDaiDien)
                ]);
                break;
            case '1':
                switch ($request->LoaiBinhLuan) {
                    case '1':
                        $comment = Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
                            ->join('taikhoan', 'binhluan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                            ->get();
                        return response()->json([
                            'view' => "" . view('Component/Comment/CommentLv1')
                                ->with('comment', $comment[0])
                                ->with('item', Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get())
                        ]);
                        break;
                    case '2':
                        $comment = Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
                            ->join('taikhoan', 'binhluan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                            ->get();
                        $comment_main = Binhluan::where('binhluan.IDBinhLuan', '=', $comment[0]->PhanHoi)
                            ->join('taikhoan', 'binhluan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                            ->get();
                        return response()->json([
                            'view' => "" . view('Component/Comment/CommentLv2')
                                ->with('comment', $comment[0])
                                ->with('comment_main', $comment_main[0])
                                ->with('item', Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get())
                        ]);
                        break;
                    default:
                        # code...
                        break;
                }
                break;

            default:
                # code...
                break;
        }
    }
    public function edit(Request $request)
    {
        $json = (object)[];
        switch ($request->LoaiBinhLuan) {
            case '0':
                $json = (object)[
                    'ID' => '10000',
                    'LoaiBinhLuan' => '0',
                    'DuongDan' => '',
                    'NoiDungBinhLuan' => $request->NoiDungBinhLuan
                ];
                break;
            case '1':
                if ($request->hasFile('fileImage')) {
                    $comment = Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
                        ->join('taikhoan', 'binhluan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                        ->get()[0];
                    if (File::exists(public_path(json_decode($comment->NoiDungBinhLuan)->DuongDan)))
                        File::delete(public_path(json_decode($comment->NoiDungBinhLuan)->DuongDan));
                    $nameFile = Session::get('user')[0]->IDTaiKhoan . $request->IDBinhLuan . '.jpg';
                    $request->file('fileImage')->move(public_path('img/CommentImage'), $nameFile);
                    $json = (object)[
                        'ID' => '10000',
                        'LoaiBinhLuan' => '1',
                        'DuongDan' => 'img/CommentImage/' . $nameFile,
                        'NoiDungBinhLuan' => $request->NoiDungBinhLuan
                    ];
                } else
                    $json = (object)[
                        'ID' => '10000',
                        'LoaiBinhLuan' => '1',
                        'DuongDan' => $request->DuongDanHinhAnh,
                        'NoiDungBinhLuan' => $request->NoiDungBinhLuan
                    ];
                break;

            case '2':
                $json = (object)[
                    'ID' => '10000',
                    'LoaiBinhLuan' => '2',
                    'DuongDan' => $request->IDNhanDan,
                    'NoiDungBinhLuan' => $request->NoiDungBinhLuan
                ];
                break;
        }
        DB::update('UPDATE binhluan SET binhluan.NoiDungBinhLuan = ? 
        WHERE binhluan.IDBinhLuan = ? ', [json_encode($json), $request->IDBinhLuan]);
        switch ($request->Level) {
            case '1':
                $comment = Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
                    ->join('taikhoan', 'binhluan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->get();
                return response()->json([
                    'view' => "" . view('Component/Comment/CommentLv1')
                        ->with('comment', $comment[0])
                        ->with('item', Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get())
                ]);
                break;
            case '2':
                $comment = Binhluan::where('binhluan.IDBinhLuan', '=', $request->IDBinhLuan)
                    ->join('taikhoan', 'binhluan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->get();
                $comment_main = Binhluan::where('binhluan.IDBinhLuan', '=', $comment[0]->PhanHoi)
                    ->join('taikhoan', 'binhluan.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
                    ->get();
                return response()->json([
                    'view' => "" . view('Component/Comment/CommentLv2')
                        ->with('comment', $comment[0])
                        ->with('comment_main', $comment_main[0])
                        ->with('item', Baidang::where('baidang.IDBaiDang', '=', $request->IDBaiDang)->get())
                ]);
                break;
            default:
                # code...
                break;
        }
    }
}

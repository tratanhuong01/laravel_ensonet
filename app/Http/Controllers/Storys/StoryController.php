<?php

namespace App\Http\Controllers\Storys;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StringUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function create(Request $request)
    {
        $idStory = StringUtil::ID('story', 'IDStory');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $image = $request->dataURI; // image base64 encoded
        preg_match("/data:image\/(.*?);/", $image, $image_extension); // extract the image extension
        $image = preg_replace('/data:image\/(.*?);base64,/', '', $image); // remove the type part
        $image = str_replace(' ', '+', $image);
        $imageName = $request->IDTaiKhoan . $idStory . ".png"; //generating unique file name;
        Storage::disk('public')->put($imageName, base64_decode($image));
        rename(storage_path('app/public/') . $imageName, public_path('img/story/') . $imageName);
        Story::add(
            $idStory,
            'CHIBANBE',
            $request->IDTaiKhoan,
            $request->IDPhongNen,
            'img/story/' . $imageName,
            '0',
            date("Y-m-d H:i:s")
        );
        redirect()->to('index')->send();
    }
    public function load(Request $request)
    {
        return Story::where('story.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->whereRaw('DATEDIFF(NOW(),story.ThoiGianDangStory) = 0')
            ->join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderBy('story.ThoiGianDangStory', 'ASC')
            ->get()[$request->Index]->DuongDan;
    }
}

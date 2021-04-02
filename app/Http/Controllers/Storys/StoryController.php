<?php

namespace App\Http\Controllers\Storys;

use App\Http\Controllers\Controller;
use App\Models\Amthanh;
use App\Models\Luotxemstory;
use App\Models\Story;
use App\Models\StringUtil;
use App\Process\DataProcessFive;
use App\Process\DataProcessThird;
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
        $music = Amthanh::where('amthanh.IDAmThanh', '=', $request->IDAmThanh)->get();
        $jsonMusic = NULL;
        if (count($music) > 0) {
            $jsonMusic = [
                'IDStory' => $idStory,
                'IDAmThanh' => $music[0]->IDAmThanh,
                'DuongDanAmThanh' => $music[0]->DuongDanAmThanh,
                'TacGia' => $music[0]->TacGia,
                'TenAmThanh' => $music[0]->TenAmThanh
            ];
        }
        Story::add(
            $idStory,
            'CHIBANBE',
            $request->IDTaiKhoan,
            $request->IDPhongNen,
            'img/story/' . $imageName,
            '0',
            date("Y-m-d H:i:s"),
            json_encode($jsonMusic)
        );
        redirect()->to('index')->send();
    }
    public function load(Request $request)
    {
        $story =  Story::where('story.IDTaiKhoan', '=', $request->IDTaiKhoan)
            ->whereRaw('DATEDIFF(NOW(),story.ThoiGianDangStory) = 0')
            ->join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderBy('story.ThoiGianDangStory', 'ASC')
            ->get()[$request->Index];
        return response()->json([
            'DuongDan' => $story->DuongDan,
            'ThoiGianDangStory' => StringUtil::CheckDateTimeStory($story->ThoiGianDangStory),
            'IDStory' => $story->IDStory
        ]);
    }
    public function addViewStory($idTaiKhoan)
    {
        $allStory = DataProcessThird::sortStoryByID(Session::get('user')[0]->IDTaiKhoan);
        $story = Story::where('story.IDTaiKhoan', '=', $idTaiKhoan)
            ->whereRaw('DATEDIFF(NOW(),story.ThoiGianDangStory) = 0')
            ->join('taikhoan', 'story.IDTaiKhoan', 'taikhoan.IDTaiKhoan')
            ->orderBy('story.ThoiGianDangStory', 'ASC')
            ->get();
        $view = Luotxemstory::where('luotxemstory.IDStory', '=', $story[0]->IDStory)
            ->where('luotxemstory.IDXem', '=', Session::get('user')[0]->IDTaiKhoan)->get();
        if (count($view) > 0) {
        } else {
            Luotxemstory::add(
                NULL,
                $story[0]->IDStory,
                Session::get('user')[0]->IDTaiKhoan
            );
        }
        return view('Guest/Story/viewstory')->with('story', $story)
            ->with('allStory', $allStory)
            ->with('numberStoryDisplay', count($allStory))
            ->with('indexOfStory', DataProcessFive::getIndexOfStory($allStory, $story));
    }
    public function loadAndAddViewStory(Request $request)
    {
        $str = Story::where('IDStory', '=', $request->IDStory)->get()[0];
        $view = Luotxemstory::where('luotxemstory.IDStory', '=', $request->IDStory)
            ->where('luotxemstory.IDXem', '=', $request->IDTaiKhoan)
            ->join('story', 'luotxemstory.IDStory', 'story.IDStory')->get();
        if (count($view) > 0) {
            return response()->json([
                'urlMp3' => $str->AmThanh == NULL ? '/' : json_decode($str->AmThanh)->DuongDanAmThanh,
                'SoTheMoi' => '',
                'Border' => '',
                'ViewStoryDetail' => "" . view('Guest/Story/Child/DetailViewStory')
                    ->with('viewStory', DataProcessThird::getViewStoryByIDStory($request->IDStory, $request->IDTaiKhoan))
            ]);
        } else {
            Luotxemstory::add(
                NULL,
                $request->IDStory,
                $request->IDTaiKhoan
            );
            $dt = DataProcessThird::checkIsViewStoryOfUser(
                $str->IDTaiKhoan,
                $request->IDTaiKhoan
            );
            return response()->json([
                'urlMp3' => $str->AmThanh == NULL ? '/' : json_decode($str->AmThanh)->DuongDanAmThanh,
                'SoTheMoi' => $dt == 0 ? '' : $dt . ' thẻ mới  ',
                'Border' => $dt == 0 ? 'border-blue-500' : '',
                'ViewStoryDetail' => view('Guest/Story/Child/DetailViewStory')
                    ->with('viewStory', DataProcessThird::getViewStoryByIDStory($request->IDStory, $request->IDTaiKhoan))
            ]);
        }
    }
    public function nextStory(Request $request)
    {
        if (
            $request->indexStory ==
            count(DataProcessThird::sortStoryByID($request->IDTaiKhoan))
        ) {
            return response()->json([
                'end' => "" . view('Guest/Story/Child/HetTin')
            ]);
        } else {
            $strMain = DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory][$request->numberStory];
            $view = Luotxemstory::where('luotxemstory.IDStory', '=', $strMain->IDStory)
                ->where('luotxemstory.IDXem', '=', $request->IDTaiKhoan)
                ->join('story', 'luotxemstory.IDStory', 'story.IDStory')->get();
            if ($strMain->IDTaiKhoan == $request->IDTaiKhoan) {
                if (count($view) > 0) {
                    return response()->json([
                        'countStory' => count(DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDTaiKhoanStory' => $strMain->IDTaiKhoan,
                        'user' => 'user',
                        'IDStory' => $strMain->IDStory,
                        'DuongDan' => $strMain->DuongDan,
                        'urlMp3' => $strMain->AmThanh == NULL ? '/' : json_decode($strMain->AmThanh)->DuongDanAmThanh,
                        'SoTheMoi' => '',
                        'Border' => '',
                        'ViewStoryDetail' => "" . view('Guest/Story/Child/DetailViewStory')
                            ->with(
                                'viewStory',
                                DataProcessThird::getViewStoryByIDStory(
                                    $strMain->IDStory,
                                    $request->IDTaiKhoan
                                )
                            )
                    ]);
                } else {
                    Luotxemstory::add(
                        NULL,
                        $strMain->IDStory,
                        $request->IDTaiKhoan
                    );
                    $dt = DataProcessThird::checkIsViewStoryOfUser(
                        $strMain->IDTaiKhoan,
                        $request->IDTaiKhoan
                    );
                    return response()->json([
                        'countStory' => count(DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDTaiKhoanStory' => $strMain->IDTaiKhoan,
                        'user' => 'user',
                        'IDStory' => $strMain->IDStory,
                        'DuongDan' => $strMain->DuongDan,
                        'urlMp3' => $strMain->AmThanh == NULL ? '/' : json_decode($strMain->AmThanh)->DuongDanAmThanh,
                        'SoTheMoi' => $dt == 0 ? '' : $dt . ' thẻ mới  ',
                        'Border' => $dt == 0 ? 'border-blue-500' : '',
                        'ViewStoryDetail' => view('Guest/Story/Child/DetailViewStory')
                            ->with('viewStory', DataProcessThird::getViewStoryByIDStory($strMain->IDStory, $request->IDTaiKhoan))
                    ]);
                }
            } else {
                if (count($view) > 0) {
                    return response()->json([
                        'countStory' => count(DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDTaiKhoanStory' => $strMain->IDTaiKhoan,
                        'IDStory' => $strMain->IDStory,
                        'DuongDan' => $strMain->DuongDan,
                        'urlMp3' => $strMain->AmThanh == NULL ? '/' : json_decode($strMain->AmThanh)->DuongDanAmThanh,
                        'SoTheMoi' => '',
                        'Border' => '',
                        'viewMain' => "" . view('Guest/Story/Child/FriendsStory')->with('story', DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'ViewStoryDetail' => "" . view('Guest/Story/Child/DetailViewStory')
                            ->with(
                                'viewStory',
                                DataProcessThird::getViewStoryByIDStory(
                                    $strMain->IDStory,
                                    $request->IDTaiKhoan
                                )
                            )
                    ]);
                } else {
                    Luotxemstory::add(
                        NULL,
                        $strMain->IDStory,
                        $request->IDTaiKhoan
                    );
                    $dt = DataProcessThird::checkIsViewStoryOfUser(
                        $strMain->IDTaiKhoan,
                        $request->IDTaiKhoan
                    );
                    return response()->json([
                        'countStory' => count(DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDTaiKhoanStory' => $strMain->IDTaiKhoan,
                        'viewMain' => "" . view('Guest/Story/Child/FriendsStory')->with('story', DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDStory' => $strMain->IDStory,
                        'DuongDan' => $strMain->DuongDan,
                        'urlMp3' => $strMain->AmThanh == NULL ? '/' : json_decode($strMain->AmThanh)->DuongDanAmThanh,
                        'SoTheMoi' => $dt == 0 ? '' : $dt . ' thẻ mới  ',
                        'Border' => $dt == 0 ? 'border-blue-500' : '',
                        'ViewStoryDetail' => view('Guest/Story/Child/DetailViewStory')
                            ->with('viewStory', DataProcessThird::getViewStoryByIDStory($strMain->IDStory, $request->IDTaiKhoan))
                    ]);
                }
            }
        }
    }
    public function previousStory(Request $request)
    {
        if (
            $request->indexStory < 0
        ) {
            return response()->json([
                'end' => "" . view('Guest/Story/Child/HetTin')
            ]);
        } else {
            $strMain = DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory][$request->numberStory];
            $view = Luotxemstory::where('luotxemstory.IDStory', '=', $strMain->IDStory)
                ->where('luotxemstory.IDXem', '=', $request->IDTaiKhoan)
                ->join('story', 'luotxemstory.IDStory', 'story.IDStory')->get();
            if ($strMain->IDTaiKhoan == $request->IDTaiKhoan) {
                if (count($view) > 0) {
                    return response()->json([
                        'viewMain' => "" . view('Guest/Story/Child/UserStory')->with('story', DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'countStory' => count(DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDTaiKhoanStory' => $strMain->IDTaiKhoan,
                        'user' => 'user',
                        'IDStory' => $strMain->IDStory,
                        'DuongDan' => $strMain->DuongDan,
                        'urlMp3' => $strMain->AmThanh == NULL ? '/' : json_decode($strMain->AmThanh)->DuongDanAmThanh,
                        'SoTheMoi' => '',
                        'Border' => '',
                        'ViewStoryDetail' => "" . view('Guest/Story/Child/DetailViewStory')
                            ->with(
                                'viewStory',
                                DataProcessThird::getViewStoryByIDStory(
                                    $strMain->IDStory,
                                    $request->IDTaiKhoan
                                )
                            )
                    ]);
                } else {
                    Luotxemstory::add(
                        NULL,
                        $strMain->IDStory,
                        $request->IDTaiKhoan
                    );
                    $dt = DataProcessThird::checkIsViewStoryOfUser(
                        $strMain->IDTaiKhoan,
                        $request->IDTaiKhoan
                    );
                    return response()->json([
                        'viewMain' => "" . view('Guest/Story/Child/UserStory')->with('story', DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'countStory' => count(DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDTaiKhoanStory' => $strMain->IDTaiKhoan,
                        'user' => 'user',
                        'IDStory' => $strMain->IDStory,
                        'DuongDan' => $strMain->DuongDan,
                        'urlMp3' => $strMain->AmThanh == NULL ? '/' : json_decode($strMain->AmThanh)->DuongDanAmThanh,
                        'SoTheMoi' => $dt == 0 ? '' : $dt . ' thẻ mới  ',
                        'Border' => $dt == 0 ? 'border-blue-500' : '',
                        'ViewStoryDetail' => view('Guest/Story/Child/DetailViewStory')
                            ->with('viewStory', DataProcessThird::getViewStoryByIDStory($strMain->IDStory, $request->IDTaiKhoan))
                    ]);
                }
            } else {
                if (count($view) > 0) {
                    return response()->json([
                        'countStory' => count(DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDTaiKhoanStory' => $strMain->IDTaiKhoan,
                        'IDStory' => $strMain->IDStory,
                        'DuongDan' => $strMain->DuongDan,
                        'urlMp3' => $strMain->AmThanh == NULL ? '/' : json_decode($strMain->AmThanh)->DuongDanAmThanh,
                        'SoTheMoi' => '',
                        'Border' => '',
                        'viewMain' => "" . view('Guest/Story/Child/FriendsStory')->with('story', DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'ViewStoryDetail' => "" . view('Guest/Story/Child/DetailViewStory')
                            ->with(
                                'viewStory',
                                DataProcessThird::getViewStoryByIDStory(
                                    $strMain->IDStory,
                                    $request->IDTaiKhoan
                                )
                            )
                    ]);
                } else {
                    Luotxemstory::add(
                        NULL,
                        $strMain->IDStory,
                        $request->IDTaiKhoan
                    );
                    $dt = DataProcessThird::checkIsViewStoryOfUser(
                        $strMain->IDTaiKhoan,
                        $request->IDTaiKhoan
                    );
                    return response()->json([
                        'countStory' => count(DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDTaiKhoanStory' => $strMain->IDTaiKhoan,
                        'viewMain' => "" . view('Guest/Story/Child/FriendsStory')->with('story', DataProcessThird::sortStoryByID($request->IDTaiKhoan)[$request->indexStory]),
                        'IDStory' => $strMain->IDStory,
                        'DuongDan' => $strMain->DuongDan,
                        'urlMp3' => $strMain->AmThanh == NULL ? '/' : json_decode($strMain->AmThanh)->DuongDanAmThanh,
                        'SoTheMoi' => $dt == 0 ? '' : $dt . ' thẻ mới  ',
                        'Border' => $dt == 0 ? 'border-blue-500' : '',
                        'ViewStoryDetail' => view('Guest/Story/Child/DetailViewStory')
                            ->with('viewStory', DataProcessThird::getViewStoryByIDStory($strMain->IDStory, $request->IDTaiKhoan))
                    ]);
                }
            }
        }
    }
}

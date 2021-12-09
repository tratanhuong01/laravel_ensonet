<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Taikhoan;
use App\Process\DataProcessFour;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function load(Request $request)
    {
        switch ($request->Type) {
            case 'PictureHaveFaceOfUser':
                return response()->json([
                    'view' => "" . view('Component.Child.Image')
                        ->with(
                            'imageTag',
                            DataProcessFour::sortImageByTagOfUser($request->IDTaiKhoan)
                        )
                        ->with('users', Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
                            ->get()[0]),
                    'viewMore' => "" . view('Component.Child.LoadingViewMore')
                        ->with('users', Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
                            ->get()[0])
                ]);
                break;
            case 'PictureOfUser':
                return response()->json([
                    'view' => "" . view('Component.Child.Image')
                        ->with(
                            'imageTag',
                            DataProcessFour::sortImageByUser($request->IDTaiKhoan, 0)
                        )
                        ->with('users', Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
                            ->get()[0]),
                    'viewMore' => "" . view('Component.Child.LoadingViewMore')
                        ->with('users', Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
                            ->get()[0])
                ]);
                break;
            case 'Album':
               // return view('Component.Child.HinhAnh')
                //     ->with(
                //         'imageTag',
                //         DataProcessFour::groupImage($request->IDTaiKhoan)
                //     );
                // break;
            default:
                break;
        }
    }
    public function loadAndView(Request $request)
    {
        switch ($request->Type) {
            case 'PictureHaveFaceOfUser':
                $index = $request->Index == 0 ? 1 : $request->Index;
                $index++;
                $array = DataProcessFour::sortImageByTagOfUser($request->IDTaiKhoan);
                if (count($array) == 0) {
                    return '';
                } else {
                    return response()->json([
                        'view' => "" . view('Component.Child.Image')
                            ->with(
                                'imageTag',
                                array_slice($array, $request->Index * 15, 15)
                            )
                            ->with('users', Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
                                ->get()[0]),
                        'index' => $index,
                        'viewMore' => "" . view('Component.Child.LoadingViewMore')
                            ->with('users', Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
                                ->get()[0])
                    ]);
                }
                break;
            case 'PictureOfUser':
                $index = $request->Index == 0 ? 1 : $request->Index;
                $index++;
                $array = DataProcessFour::sortImageByUser($request->IDTaiKhoan, $request->Index * 15);
                if (count($array) == 0) {
                    return '';
                } else {
                    return response()->json([
                        'view' => "" . view('Component.Child.Image')->with(
                            'imageTag',
                            $array
                        )
                            ->with('users', Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
                                ->get()[0]),
                        'index' => $index,
                        'viewMore' => "" . view('Component.Child.LoadingViewMore')
                            ->with('users', Taikhoan::where('taikhoan.IDTaiKhoan', '=', $request->IDTaiKhoan)
                                ->get()[0])
                    ]);
                }

                break;
            case 'Album':
                // return view('Component/Child/HinhAnh')
                //     ->with(
                //         'imageTag',
                //         DataProcessFour::groupImage($request->IDTaiKhoan)
                //     );
                // break;
            default:
                break;
        }
    }
}

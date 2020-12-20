<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motel;

class AdminController extends Controller
{
    public function ApproveMotel(Request $request){
        $id  = $request->get('id');
        $room = Motel::find($id);
        $room->approve = 1;
        $room->save();
        return redirect('admin/motelrooms/list')->with('thongbao','Đã kiểm duyệt bài đăng: '.$room->title);
      }
      
      public function UnApproveMotel(Request $request){
        $id  = $request->get('id');
        $room = Motel::find($id);
        $room->approve = 0;
        $room->save();
        return redirect('admin/motelrooms/list')->with('thongbao','Đã bỏ kiểm duyệt bài đăng: '.$room->title);
      }
}

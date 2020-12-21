<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motel;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
      
      public function indexAdmin(Request $request){
        $adminId = Auth::user()->id;
        $list = Motel::where('user_id', $adminId)->get();
        $approve = Motel::where('approve', 1)->get();
        $unapprove = Motel::where('approve', 0)->get();
        return response()->json([
            'list' => $list,
            'approve'=> $approve,
            'unapprove'=> $unapprove,
        ], 200);
      }
}

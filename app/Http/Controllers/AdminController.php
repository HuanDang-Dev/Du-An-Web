<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motel;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $list = DB::table('motels')
            ->join('users', 'motels.user_id', 'users.id')
            ->where('user_id', $adminId)
            ->get();
        $approve = DB::table('motels')
                ->join('users', 'motels.user_id', 'users.id')
                ->where('approve', 1)
                ->where('user_id', '<>', $adminId)
                ->get();
        $unapprove = DB::table('motels')
              ->join('users', 'motels.user_id', 'users.id')
              ->where('approve', 0)
              ->where('user_id', '<>', $adminId)
              ->get();
        $user = DB::table('users')
              ->where('id', '<>', $adminId)
              ->get();
        foreach($list as $key => $item){
          $item->src = '/viewMotel/' . $item->slug;
        }
        foreach($user as $key => $item){
          $item->count = Motel::where('user_id', $item->id)->count();
        }
        foreach($approve as $key => $item){
          $item->src = '/viewMotel/' . $item->slug;
        }
        foreach($unapprove as $key => $item){
          $item->src = '/viewMotel/' . $item->slug;
        }
        return response()->json([
            'list' => $list,
            'approve'=> $approve,
            'unapprove'=> $unapprove,
            'users' => $user
        ], 200);
      }
}

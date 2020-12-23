<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motel;
use App\User;
use App\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        $report = DB::table('reports')
                    ->where('activy', 0)
                    ->get();
        foreach($list as $key => $item){
          $item->src = '/viewMotel/' . $item->slug;
          $item->update = '/post/update/' . $item->slug;
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
            'users' => $user,
            'report' => $report
        ], 200);
      }

      public function approveMotel(Request $request){
        $slug = $request->slug;
        $motel = Motel::where('slug', $slug)
            ->update(['approve' => 1]);
        return response()->json([
            'success' => true
        ], 200);
    }

    public function confirmReport(Request $request){
      $id = $request->id;
      $report = Report::where('id', $id)
          ->update(['activy' => 1]);
      return response()->json([
          'success' => true
      ], 200);
  }


    public function deleteMotel(Request $request){
      $slug  = $request->slug;
      $motel = Motel::where('slug', $slug);
      $motel->delete();
      return response()->json([
          'success' => true
      ], 200);
  }
}

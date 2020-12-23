<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Motel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexOwner(Request $request){
        $ownerId = Auth::user()->id;
        $rented = DB::table('motels')
            // ->join('users', 'motels.user_id', 'users.id')
            ->where('activy', 1)
            ->where('approve', 1)
            ->where('user_id', $ownerId)
            ->get();
        $notrent = DB::table('motels')
                // ->join('users', 'motels.user_id', 'users.id')
                ->where('activy', 0)
                ->where('approve', 1)
                ->where('user_id', $ownerId)
                ->get();
        $unapprove = DB::table('motels')
            //   ->join('users', 'motels.user_id', 'users.id')
              ->where('approve', 0)
              ->where('user_id', $ownerId)
              ->get();
        foreach($notrent as $key => $item){
          $item->src = '/viewMotel/' . $item->slug;
          $item->update = '/post/update/' . $item->slug;
        }
        foreach($rented as $key => $item){
          $item->src = '/viewMotel/' . $item->slug;
          $item->update = '/post/update/' . $item->slug;
        }
        foreach($unapprove as $key => $item){
          $item->src = '/viewMotel/' . $item->slug;
          $item->update = '/post/update/' . $item->slug;
        }
        return response()->json([
            'rented' => $rented,
            'notrent'=> $notrent,
            'unapprove'=> $unapprove,
        ], 200);
      }

      public function rentMotel(Request $request){
        $slug = $request->slug;
        $motel = Motel::where('slug', $slug)
            ->update(['activy' => 1]);
        return response()->json([
            'success' => true
        ], 200);
    }

    public function notrentMotel(Request $request){
        $slug = $request->slug;
        $motel = Motel::where('slug', $slug)
            ->update(['activy' => 0]);
        return response()->json([
            'success' => true
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Motel;
use App\User;
use App\District;
use App\Events\Comment\CommentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class MotelController extends Controller
{
    
    public function storeMotel(Request $request){
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        $motel = new Motel();
        $motel->title = $request->title;
        $motel->description = $request->description;
        $motel->price = $request->price;
        $motel->area = $request->area;
        $motel->address = $request->address;
        $motel->phone = $request->phone;
        $motel->images = "/images/" . $imageName;
        $motel->user_id = auth()->user()->id;
        $motel->district_id = $request->district_id;

        $user = User::where('id', auth()->user()->id)->first();
        if($user->role == 1){
            $motel->approve = 1;
        }
        $motel->save();
        return response()->json([
            'success' => true
        ], 200);
    }

    public function deleteMotel(Request $request){
        $id  = $request->get('id');
        $motel = Motel::find($id);
        $motel->delete();
    }

    public function getMotel(Request $request){
        $district = $request->districtId;
        $listMotel = DB::table('motels')
                    ->where('district_id', $district)
                    ->where('approve', 1)
                    ->orderByRaw('created_at DESC')
                    ->get();
        foreach($listMotel as $key => $item){
            $item->src = '/viewMotel/' . $item->slug;
        }
        return $listMotel;
    } 
    
    public function getDistrict(){
        $districts = District::all();
        return $districts;
    }

    public function getViewMotel(Request $request){
        $slug = $request->slug;
        $listMotel = DB::table('motels')
                    ->where('slug', $slug)
                    // ->orderByRaw('created_at DESC')
                    ->get();
        foreach($listMotel as $key => $item){
            $item->src = '/viewMotel/' . $item->slug;
        }
        return $listMotel;
    } 

    public function searchMotel(Request $request){
        $slug = $request->slug;
        $district = $request->districtId;
        $listMotel = DB::table('motels')
                    ->where('district_id', $district)
                    ->where('slug','like', '%' . $slug . '%')
                    ->where('approve', 1)
                    ->orderByRaw('created_at DESC')
                    ->get();
        foreach($listMotel as $key => $item){
            $item->src = '/viewMotel/' . $item->slug;
        }
        return $listMotel;
    } 

    public function approveMotel(Request $request){
        $slug = $request->slug;
        $motel = Motel::where('slug', $slug)
            ->update(['approve' => 1]);
        return response()->json([
            'success' => true
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Motel;
use App\User;
use App\District;
use App\Rating;
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
        $rate = 0;
        foreach($listMotel as $key => $item){
            $item->src = '/viewMotel/' . $item->slug;
            $countRating = Rating::where('motel_id', $item->id)->count();
            if(auth()->user()){
                if($new = Rating::where('motel_id', $item->id)->where('user_id', auth()->user()->id)->first()){
                    $rate = $new->rating;
                }
            }
        }
        return response()->json([
            'motel' => $listMotel,
            'countRating' => $countRating,
            'rate' => $rate,
        ], 200);
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

    public function rating(Request $request){
        $motelId = $request->motelId;
        $rating = $request->rating;
        if(auth()->user()){
            if(
                $rate = Rating::where('motel_id', $motelId)
                    ->where('user_id', auth()->user()->id)
                    ->first()
            ) {
                $rate->rating = $rating;
                $rate->save();
                $avg = DB::table('ratings')
                    ->where('motel_id', $motelId)
                    ->avg('rating');
                $avg = round($avg);
                $motel = Motel::where('id', $motelId)
                    ->update(['rating' => $avg]);
            } else {
                $rate = new Rating();
                $rate->motel_id = $motelId;
                $rate->rating = $rating;
                $rate->user_id = auth()->user()->id;
                $rate->save();
                $avg = DB::table('ratings')
                    ->where('motel_id', $motelId)
                    ->avg('rating');
                $avg = round($avg);
                $motel = Motel::where('id', $motelId)
                    ->update(['rating' => $avg]);
            }
            
            return response()->json([
                'success' => true
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 200);
    }
}

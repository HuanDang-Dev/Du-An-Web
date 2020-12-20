<?php

namespace App\Http\Controllers;

use App\Motel;
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
        $motel->save();
        return response($request, 200);
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
}

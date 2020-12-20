<?php

namespace App\Http\Controllers;

use App\Motel;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MotelController extends Controller
{
    public function storeMotel(Request $request){
        if($request->get('image'))
       {
          $image = $request->get('image');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->save(public_path('images/').$name);
        }
        // $motel = new Motel();
        // $motel->tilte = $request->get('title');
        // $motel->description = $request->get('description');
        // $motel->price = (int)$request->get('price');
        // $motel->area = (int)$request->get('area');
        // $motel->address = $request->get('address');
        // $motel->phone = (int)$request->get('phone');
        // $motel->images = "hell";
        // $motel->user_id = $request->get('user_id');
        // $motel->district_id = (int)$request->get('district_id');
        // $motel->save();
        return response()->json(['success' => $name], 200);
    }

    public function deleteMotel(Request $request){
        $id  = $request->get('id');
        $motel = Motel::find($id);
        $motel->delete();
    }

    public function getMotel(Request $request){
        $district = $request->get('district');
        $listMotel = DB::table('motels')
                    // ->where('district_id', $)
                    // ->orderByRaw('created_at DESC')
                    ->get();
        return $listMotel;   
    } 
    
    public function getDistrict(){
        $districts = District::all();
        return $districts;
    }
}

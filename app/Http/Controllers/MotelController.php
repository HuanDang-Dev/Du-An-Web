<?php

namespace App\Http\Controllers;

use App\Motel;
use Illuminate\Http\Request;

class MotelController extends Controller
{
    public function storeMotel(Request $request){
        if($request->get('images'))
       {
          $image = $request->get('images');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image'))->save(public_path('images/').$name);
        }
        $motel = new Motel();
        $motel->tilte = $request->get('title');
        $motel->description = $request->get('description');
        $motel->price = $request->get('price');
        $motel->area = $request->get('area');
        $motel->address = $request->get('address');
        $motel->phone = $request->get('phone');
        $motel->images = $name;
        $motel->user_id = $request->get('user_id');
        $motel->district_id = $request->get('district_id');
        $motel->utilities = $request->get('utilities');
        $motel->save();
    }
}

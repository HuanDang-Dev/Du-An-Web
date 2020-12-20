<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function login(Request $req){
        $req->validate([
            'user' => 'required',
            'pass' => 'required',
            
        ],[
            'user.required' => 'Vui lòng nhập tài khoản',
            'pass.required' => 'Vui lòng nhập mật khẩu'
            
        ]);
        if(Auth::attempt(['username'=>$req->user,'password'=>$req->pass])){
         return redirect('/');
     }
     else 
         return redirect('/login')->with('warn','Tài khoản hoặc mật khẩu không đúng');	
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function current_user()
    {
        $id = auth()->user();
        // $user = User::latest()->where('id','=',$id)->get();
        return $id;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('chat');
    }

    public function indexPost()
    {
        return view('post');
    }

    public function indexAdmin()
    {
        return view('admin');
    }

    public function indexRule()
    {
        return view('rule');
    }
    // public function indexView()
    // {
    //     return view('viewMotel');
    // }
    public function indexOwner()
    {
        return view('owner');
    }
}

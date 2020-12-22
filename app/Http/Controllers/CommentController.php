<?php

namespace App\Http\Controllers;

use App\Events\Comment\CommentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Comment;
use App\User;
use App\Motel;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexComment()
    {
        return redirect('/home');
    }
    
    public function index(Request $request)
    {
        $maxIndex = Comment::select('id')->where('motel_id', $request->motelId)->count();

        $comments = Comment::where('motel_id', $request->motelId)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        $moreComments = Comment::where('motel_id', $request->motelId)
        ->orderBy('id', 'desc')
        ->limit(14)
        ->get(); 

        return response()->json(['comments' => $comments,'moreComments' => $moreComments, 'max' => $maxIndex], 201);
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->motel_id = $request->motelId;
        $comment->body = $request->comment;
        $comment->save();

        return response()->json(['comment' => $comment], 201);
    }
}
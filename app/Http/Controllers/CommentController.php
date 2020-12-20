<?php

namespace App\Http\Controllers;

use App\Events\Comment\CommentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Comment;
use App\User;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'motelId' => 'required',
        ]);

        $maxIndex = DB::table('comments')->max('id');

        $comments = Comment::where('motel_id', $data['motelId'])
            ->orderBy('id')
            ->skip($maxIndex - 4)
            ->take($maxIndex)
            ->get();

        $moreComments = Comment::where('motel_id', $data['motelId'])
        ->orderBy('id')
        ->skip($maxIndex - 14)
        ->take($maxIndex)
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
<?php

namespace App\Http\Controllers;
use App\Events\Comment\CommentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\CommentReply;
use App\User;

class CommentReplyController extends Controller
{
    public function index(Request $request)
    {
        $maxIndex = CommentReply::select('id')->where('comment_id', $request->commentId)->count();

        $commentsabc = CommentReply::where('comment_id', $request->commentId)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
        $comments = $commentsabc->sortByDesc('id');
        $moreComments = CommentReply::where('comment_id', $request->commentId)
        ->orderBy('id', 'desc')
        ->limit(14)
        ->get(); 

        return response()->json(['comments' => $comments,'moreComments' => $moreComments, 'max' => $maxIndex], 201);
    }

    public function store(Request $request)
    {
        $comment = new CommentReply();
        $comment->user_id = auth()->user()->id;
        $comment->comment_id = $request->commentId;
        $comment->body = $request->comment;
        $comment->save();

        return response()->json(['comment' => $comment], 201);
    }
}

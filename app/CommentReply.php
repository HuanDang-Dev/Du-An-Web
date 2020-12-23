<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $table = 'comment_replies';
    protected $guarded = [];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

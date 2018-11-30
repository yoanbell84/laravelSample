<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class CommentReply extends Model
{
    //
    protected $fillable = [
                'comment_id',
                'author',
                'email',
                'photo',
                'body'
            ];
    
    public function comment(){
        
        return $this->belongsTo('App\Comment');
    }
    
}

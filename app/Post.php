<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    //  
    protected $fillable = [
        'user_id','category_id','photo_id','title','body'
    ];
    
    public function photo(){        
       return $this->belongsTo('App\Photo');
    }
    
    public function user(){
       return $this->belongsTo('App\User');
    }
    
    public function category(){
       return $this->belongsTo('App\Category');
    }
    
    public function comments(){
        
        return $this->hasMany('App\Comment');
    }   

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //    
   protected $fillable = [ 'file'];
   protected $uploadDirectory = "/images/";
   
   public function getFileAttribute($photo){
       return $this->uploadDirectory.$photo;
   }
}

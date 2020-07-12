<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $fillable = [
       'body', 'user_id'
   ];

   public function post(){
       return $this->belongsTo(BlogPost::class,'blog_post_id','id');
   }

   public function user(){
       return $this->belongsTo(User::class);
   }
}

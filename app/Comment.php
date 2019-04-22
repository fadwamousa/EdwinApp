<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = ['post_id','author','email','body','is_active','photo_id'];

  public function replies(){
    return $this->hasMany(CommentRelpy::class);
  }

  public function post(){
    return $this->belongsTo(Post::class);
  }

}

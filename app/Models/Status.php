<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Models\Like;

use App\Models\Comment;
class Status extends Model
{
    protected $fillable =[
        'body'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->morphMany(Like::class,'likeable');
    }

    public function getLikes(){
        return $likes = $this->likes()->count();        
    }
}

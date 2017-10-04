<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Models\Status;

use App\Models\Like;

class Comment extends Model
{
    public function __construct(){

    }

    protected $fillable =[
        'body'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function likes(){
        return $this->morphMany(Like::class,'likeable');
    }

    public function getLikes(){
        return $likes = $this->likes()->count();        
    }
}   

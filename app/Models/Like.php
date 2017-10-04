<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Models\Comment;
class Like extends Model
{
    protected $table = 'likeable';

    public function likeable(){
        return $this->morphTo();
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}

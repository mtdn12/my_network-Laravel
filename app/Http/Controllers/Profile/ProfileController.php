<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function __constrcut(){
        $this->middleware('auth');
    }

    public function index($user_id){
        $user = User::where('id',$user_id)->first();

        $friends = $user->friends();

        return view('/profile/index')
                ->with('user',$user)
                ->with('friends',$friends);
    }
}

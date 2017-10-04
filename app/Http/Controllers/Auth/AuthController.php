<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use Auth;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('login','register');
    }

    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required|max:25|unique:users',
            'email'=>'email|required|unique:users',
            'password'=>'required|between:6,25'
        ]);

        $user = new User();
        $user->name = $request->name;

        $user->email = $request->email;

        $user->password = bcrypt($request->password);

        $user->save();

        Auth::login($user);

        return redirect()->route('home')->with('info','Your account has been created.You are logged in');

    }

    public function login(Request $request){
        $this->validate($request,[
            'email_li'=>'required|email',
            'password_li'=>'required|between:6,25'
        ]);

        $checkLogin =[
            'email'=>$request->email_li,c
            'password'=>$request->password_li
        ];
        if(!Auth::attempt($checkLogin)){
            return redirect()->route('home')->with('error','We cant loged you In with these detail.');
        }
        return redirect()->route('home')->with('info','you are logged in');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
    

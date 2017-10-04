<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class HomeController extends Controller
{
    public function __construct(){
       
    }

    public function index(){       
        
        if(Auth::check()){
            $statuses = Auth::user()->statuses()->orderBy('created_at','desc')->get();                 
            return view('/home/index')->with('statuses',$statuses);
        } else {
            return view('welcome');
        }
        
      
      
    } 
}

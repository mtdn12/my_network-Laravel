<?php

namespace App\Http\Controllers\Timeline;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Status;

class TimelineController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $statuses = Status::orderBy('created_at','desc')->with('comments')->get();

        return view('/time_line/index')->with('statuses',$statuses);
    }
}

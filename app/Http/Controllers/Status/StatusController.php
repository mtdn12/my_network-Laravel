<?php

namespace App\Http\Controllers\Status;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Status;

use App\User;

use Auth;

class StatusController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function postStatus(Request $request){
        $this->validate($request,[
            'status'=>'required|max:3000'
        ]);
        $status = new Status();

        $status->body = $request->status;

        $status->user_id = $request->user()->id;        

        $status->save();

        return redirect()->back()->with('info','Your status have been successfully create.');
    }

    public function deleteStatus($status_id){
        $status = Status::where('id',$status_id)->first();   

        if(Auth::user()->id !== $status->user->id){
            return redirect()
                    ->back()
                    ->with('error','You only can delete your status');
        } 
        $status->comments()->delete();

        $status->delete();

        return redirect()
                ->back();
    }

    public function editStatus(Request $request , $status_id){
        $status = Status::where('id',$status_id)->first();

        if(Auth::user()->id !== $status->user->id){
            return redirect()
                    ->back()
                    ->with('error','You only can edit your status.');
        }

        $status->body = $request->body;

        $status->update();

        return redirect()
                ->route('get-timeline')
                ->with('info','Your status has been successfully updated');
    }

    public function getEdit($status_id){
        $status = Status::where('id',$status_id)->first();        

        return view('/edit/edit_status')
                ->with('status',$status);
    }

    public function getLike($status_id){
        $status = Status::where('id',$status_id)->first();

        if(!$status){
            return redirect()
                    ->back()
                    ->with('error','Can not find that status');
        }

        if(Auth::user()->hasLikedStatus($status)){
            return redirect()->back();
        }

        $like = $status->likes()->create([
          
        ]);

        Auth::user()->likes()->save($like);

        return redirect()->back();
    }


}
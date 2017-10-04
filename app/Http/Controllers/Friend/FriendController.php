<?php

namespace App\Http\Controllers\Friend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use Auth;
class FriendController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
        $friends = Auth::user()->friends();

        $UserYouSendRequests = Auth::user()->userSendRequest();

        $userSendYouRequests = Auth::user()->userReceiveRequest();

        return view('/friend/index')
                ->with('friends',$friends)
                ->with('UserYouSendRequests',$UserYouSendRequests)
                ->with('userSendYouRequests',$userSendYouRequests);
    }

    public function addFriend($user_name){
        $user = User::where('name',$user_name)->first();
        if(!$user){
            return redirect()
            ->route('home')
            ->with('info','We can not find that person');
        }
        if(Auth::user()->id==$user->id){
            return redirect()->route('home');
        }
        if(Auth::user()->isFriendWith($user)){
            return redirect()
                    ->back()
                    ->with('info',"Your're both already friends");
        }
        if(Auth::user()->hasWaitingRequestAccept($user)){
            return redirect()
                    ->back()
                    ->with('info','You already sent friend to this person');
        }
        if(Auth::user()->canAcceptRequest($user)){
            return redirect()
                    ->back()
                    ->with('info','This person sent you a friend request,please check and accept');
        }

        Auth::user()->addFriend($user);
        return redirect()
                ->back()
                ->with('info','you friend request has been sent.');

    }

    public function acceptFriend($user_name){
        $user = User::where('name',$user_name)->first();

        if(!$user){
            return redirect()
            ->route('home')
            ->with('info','We can not find that person');
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()
                ->back()
                ->with('info',"You accepted friend request");
    }

    public function findFriend(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);

        $users = User::where('name',$request->name)->get(); 
        
        return view('/friend/search_friend')                
                ->with('users',$users);
    }
}

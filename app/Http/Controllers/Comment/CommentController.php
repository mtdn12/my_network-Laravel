<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Status;

use App\Models\Comment;

use Auth;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function postComment(Request $request,$status_id){

        $status = Status::where('id',$status_id)->first();

        $this->validate($request,[
            "comment-$status_id"=>'required|max:2000'
        ]);

        $comment = new Comment();

        $comment->body = $request->input("comment-$status_id");

        $comment->user_id = $request->user()->id;   
        
        $status->comments()->save($comment);

        return redirect()->back();
    }

  

    public function deleteComment($comment_id){
        $comment = Comment::where('id',$comment_id)->first();        
        if(Auth::user()->id !== $comment->user->id){
            return redirect()
                    ->back()
                    ->with('info','You only can delete your comment');
        }           
        $comment->delete();
        return redirect()->back();

    }

    public function editCommnet(Request $request , $comment_id){
        $comment = Comment::where('id',$comment_id)->first();

        if(Auth::user()->id !== $comment->user->id){
            return redirect()
                    ->back()
                    ->with('error','You only can edit your comment.');
        }

        $comment->body = $request->body;

        $comment->update();        

        return redirect()
                ->route('get-timeline')
                ->with('info','Your comment has been successfully updated');
    }

    public function getEdit($comment_id){
        $comment = Comment::where('id',$comment_id)->first();
      
        return view('/edit/edit_comment')
                ->with('comment',$comment);
    }

    public function getLike($comment_id){
        $comment = Comment::where('id',$comment_id)->first();
        
                if(!$comment){
                    return redirect()
                            ->back()
                            ->with('error','Can not find that comment');
                }
        
                if(Auth::user()->hasLikedComment($comment)){
                    return redirect()->back();
                }
        
                $like = $comment->likes()->create([
                  
                ]);
        
                Auth::user()->likes()->save($like);
        
                return redirect()->back();
    }
}

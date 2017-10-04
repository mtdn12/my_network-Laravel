<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Like;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function statuses(){
        return $this->hasMany(Status::class);
    }

    public function comments(){
        return $this->hasMany(Status::class);
    }

    #relationship between two user'

    public function user_friend(){
        return $this->belongsToMany(User::class,'friends','user_id','friend_id');
    }

    public function friend_user(){
        return $this->belongsToMany(User::class,'friends','friend_id','user_id');
    }

    public function friends(){
        return $this->user_friend()->wherePivot('accepted',true)->get()
            ->merge($this->friend_user()->wherePivot('accepted',true)->get());
    }

    public function userSendRequest(){
        return $this->user_friend()->wherePivot('accepted',false)->get();
    }

    public function userReceiveRequest(){
        return $this->friend_user()->wherePivot('accepted',false)->get();
    }

    public function hasWaitingRequestAccept(User $user){
        return (bool) $this->userSendRequest()->where('id',$user->id)->count();
    }

    public function canAcceptRequest(User $user){
        return (bool) $this->userReceiveRequest()->where('id',$user->id)->count();
    }

    public function addFriend(User $user){
        $this->user_friend()->attach($user->id);
    }

    public function acceptFriendRequest(User $user){
        return $this->userReceiveRequest()->where('id',$user->id)->first()->pivot->update([
            "accepted"=>1
        ]);
    }

    public function isFriendWith(User $user){
        return(bool) $this->friends()->where('id',$user->id)->count();
    }


    public function hasLikedStatus(Status $status){
        return (bool) $status->likes()
        ->where('likeable_id',$status->id)
        ->where('likeable_type',get_class($status))
        ->where('user_id',$this->id)
        ->count();
    }

    public function hasLikedComment(Comment $comment){
        return (bool) $comment->likes()
                ->where('likeable_id',$comment->id)
                ->where('likeable_type',get_class($comment))
                ->where('user_id',$this->id)
                ->count();
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}

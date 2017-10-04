

@foreach($statuses as $status)

<div class="status-container">
<div class='status-content'>
    <div class="media">
        <div class="media-left">
            <a href="{{route('index.profile',['user_id'=>$status->user->id])}}">
            <img src="{{asset('images/default.jpg')}}" class="media-object" style="width:60px" alt="img">
            </a>
        </div>
        <div class="media-body">
            <a href="{{route('index.profile',['user_id'=>$status->user->id])}}">
                <h4 class="media-heading">{{$status->user->name}}</h4>
            </a>
            <p>{{$status->body}}</p>
            <div class="info">
                Created by {{$status->user->name}} . {{$status->created_at->diffForHumans()}}. 
                @if($status->created_at!=$status->updated_at)
                Updated {{$status->updated_at->diffForHumans()}}.
                @endif
                 
            </div>
            <ul class="list-inline status-bottom">
                @if(Auth::user()->id != $status->user->id)
                    @if(!Auth::user()->hasLikedStatus($status))
                    <li><a href="{{route('like.status',['status_id'=>$status->id])}}">Like</a></li>
                    @endif
                <li>Liked: {{$status->getLikes()}}</li>                
                @else
                <li><a href="{{route('get.status',['status_id'=>$status->id])}}" class="edit-status">edit</a></li>
                <li><a href="{{route('delete.status',['status_id'=>$status->id])}}">delete</a></li>
                @endif
            </ul>            
            @foreach($status->comments as $comment)    
            <div class="media">
                <div class="media-left">
                    <a href="{{route('index.profile',['user_id'=>$comment->user->id])}}">
                        <img src="{{asset('images/default.jpg')}}" class="media-object" style="width:60px" alt="img">
                    </a>
                </div>
                <div class="media-body">
                    <a href="{{route('index.profile',['user_id'=>$comment->user->id])}}">
                        <h4 class="media-heading">{{$comment->user->name}}</h4>
                    </a>
                    <p>{{$comment->body}}</p>
                    <ul class="list-inline status-bottom">
                        @if(Auth::user()->id != $comment->user->id)
                            @if(!Auth::user()->hasLikedComment($comment))
                             <li><a href="{{route('like.comment',['comment_id'=>$comment->id])}}">Like</a></li>
                            @endif
                        <li>Liked: {{$comment->getLikes()}}</li>                        
                        @else
                        <li><a href="{{route('get.comment',['comment_id'=>$comment->id])}}" class="edit-comment">edit</a></li>
                        <li><a href="{{route('delete.comment',['comment_id'=>$comment->id])}}">delete</a></li>
                        @endif
                    </ul>
                </div>
            </div> 
            @endforeach     
            <div class="col-sm-8 reply-section">
            <form action="{{route('post-comment',['status_id'=>$status->id])}}" method ="POST">
                <div class="form-group {{$errors->has("comment-{$status->id}")?'has-error':''}}">
                <textarea class="form-control"  name="comment-{{$status->id}}" id="comment" rows="3" placeholder="Your comment"></textarea>
                </div>
                <button class="btn btn-primary " role="button" type="submit">Reply</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
            <div>
        </div>       
    </div>    
</div>
@endforeach
</div>


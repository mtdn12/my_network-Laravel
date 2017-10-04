<div class="media">
  <a class="pull-left" href="{{route('index.profile',['user_id'=>$user->id])}}">
    <img src="{{asset('images/default.jpg')}}" class="media-object" style="" alt="avatar">
  </a>
  <div class="media-body">
    <h4 class="media-heading"><a href="{{route('index.profile',['user_id'=>$user->id])}}">{{$user->name}}</a></h4>    
  </div>
</div>
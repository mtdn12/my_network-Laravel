<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar_auth" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('home')}}">My-Network</a>
    </div> 
    <div class="collapse navbar-collapse" id="navbar_auth">
      <ul class="nav navbar-nav">       
        <li><a href="{{route('get-timeline')}}">TimeLine</a></li> 
        <li><a href="{{route('index.friend')}}">Friend</a></li>  
      </ul> 
      <form class="navbar-form navbar-left" method="POST" action="{{route('find.friend')}}">
        <div class="form-group {{$errors->has("name")?'has-error':''}}">
            <input type="text" placeholder="Find your friend" class="form-control" name="name">
            <input type="submit" class="btn btn-primary" value="Find">
            <input type="hidden" name="_token" value="{{Session::token()}}">  
        </div>
      </form>
      <ul class="navbar-right nav navbar-nav">
        <li><a href="{{route('index.profile',['user_id'=>Auth::user()->id])}}">Hello {{Auth::user()->name}}</a></li>
        <li><a href="{{route('logout')}}" class="btn btn-default">Logout</a></li>
      </ul>      
    </div>    
  </div>
</nav>
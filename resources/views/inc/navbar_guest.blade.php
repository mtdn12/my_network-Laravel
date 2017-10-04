<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar_guest" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('home')}}">My-Recipe</a>
    </div> 
    <div class="collapse navbar-collapse" id="navbar_guest">      
      <form class="navbar-form navbar-right" method="POST" action="{{route('login')}}">
        <div class="form-group  {{$errors->has('email_li')?'has-error':''}}" >
          <input type="text" class="form-control" placeholder="Email" name="email_li" placeholder="{{old('email_li')}}">
        </div>
        <div class="form-group {{$errors->has('password_li')?'has-error':''}}" >
          <input type="password" class="form-control" placeholder="Password" name="password_li">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <input type="hidden" name="_token" value="{{Session::token()}}">  
      </form>      
    </div>    
  </div>
</nav>
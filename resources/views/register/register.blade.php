<div class="register">
    <h1>Create an user account</h1>
    <form action="{{route('register')}}" class="form" method="POST">
        <div class="form-group {{$errors->has('name')?'has-error':''}}">
            <label for="name" class="label-control">User Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="{{old('name')}}">
            <span class="help-block">{{$errors->first('name')}}</span>
        </div>
        <div class="form-group {{$errors->has('email')?'has-error':''}}">
            <label for="email" class="label-control">Email:</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="{{old('email')}}">
            <span class="help-block">{{$errors->first('email')}}</span>
        </div>
        <div class="form-group {{$errors->has('password')?'has-error':''}}">
            <label for="password" class="label-control">Password:</label>
            <input type="password" id="password" name="password" class="form-control">
            <span class="help-block">{{$errors->first('password')}}</span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Register">
            <input type="hidden" name="_token" value="{{Session::token()}}"> 
        </div> 
    </form>
</div>
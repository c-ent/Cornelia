
<form action="login" method="post">
    @csrf
    <input type="text" name="email" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">
</form>



@if ($errors->has('email'))
    <div class="alert alert-danger">
        {{ $errors->first('email') }}
    </div>
@endif


@if ($errors->has('password'))
    <div class="alert alert-danger">
        {{ $errors->first('password') }}
    </div>
@endif


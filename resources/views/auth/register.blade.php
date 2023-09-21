

<form action="register" method="post">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Register">

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</form>
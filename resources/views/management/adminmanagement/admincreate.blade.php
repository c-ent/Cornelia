
<form action=" {{ route('admin.store') }}" method="post">
    @csrf
    <div>
        <label for="name"> Admin Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="description">Admin EMail</label>
        <textarea  name="email"></textarea>
    </div>
    <div>
        <label for="password">Admin password</label>
        <textarea  name="password"></textarea>
    </div>
    <div>
        <input type="submit" value="Submit">
    </div>
</form>


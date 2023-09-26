
<form action="{{route('user.update', $user->id)}}" method="post">
   
        @csrf
        <div>
            <label for="name"> User Name</label>
            <input type="text" value="{{$user->name}}" name="name">
        </div>
        <div>
            <label for="description">user EMail</label>
            <textarea  name="email" rows="3"> {{$user->email}} </textarea>
        </div>

        <div>
            <label for="Role">Role</label>
            <select type="dropdown" name="role">
                <option value="2">Admin</option>
                <option value="3">User</option>
            </select>
        </div>
    
        <div>
            <label for="borrowing_limit">Borowing limit</label>
            <input type="number" name="borrowing_limit" value="{{$user->borrowing_limit}}">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
</form>


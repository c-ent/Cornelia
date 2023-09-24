
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
            <input type="submit" value="Submit">
        </div>
</form>


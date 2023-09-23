
<form action="{{route('admin.update', $admin->id)}}" method="post">
   
        @csrf
        <div>
            <label for="name"> Admin Name</label>
            <input type="text" value="{{$admin->name}}" name="name">
        </div>
        <div>
            <label for="description">Admin EMail</label>
            <textarea  name="email" rows="3"> {{$admin->email}} </textarea>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
</form>


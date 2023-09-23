<a href="{{ route('admin.create')}}" class="btn btn-primary">ADD</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
        <tr>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
                <a href="{{ route('admin.details', $admin->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.delete', $admin->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
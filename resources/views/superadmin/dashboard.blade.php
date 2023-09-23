<h1>dasborad for superadminnn</h1>

<div class="container">
  <h1>Super Admin Dashboard</h1>
  
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
</div>


@auth
{{auth()->user()->email}}
<div class="text-end">
  <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">Logout</a>
</div>
@endauth
<h1>dasborad for superadminnn</h1>

<div class="container">
  <h1>Super Admin Dashboard</h1>

  @include('management.adminmanagement.manageadmins') 
  @include('management.usermanagement.manageusers') 

</div>


@auth
{{auth()->user()->email}}
<div class="text-end">
  <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">Logout</a>
</div>
@endauth
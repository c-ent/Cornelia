dashboard for adminnn
<a href="/manage/users">Manage user</a>
<a href="/manage/books">Manage Books</a>
@auth
{{auth()->user()->email}}
<div class="text-end">
  <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">Logout</a>
</div>
@endauth
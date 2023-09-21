@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>WELCOMEEE</h1>

@auth
{{auth()->user()->email}}
<div class="text-end">
  <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">Logout</a>
</div>
@endauth
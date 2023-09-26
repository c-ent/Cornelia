<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Page</title>
</head>
<body>
    <div class="side-panel" >
        @if(auth()->user()->role_id === 1)
            @include('superadmin.superadmin_sidebar')
        @elseif(auth()->user()->role_id === 2)
            @include('admin.admin_sidebar')
        @else
            @include('user.user_sidebar')
        @endif
    </div>


    <div>

    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Main Page</title>
</head>
<body> 
        <div class="d-flex">
            <!-- Sidebar -->
            <div class="position-fixed" style="color: #9F9F9F;background-color: #202B2C; width: 250px; height: 100vh">
                <div class="text-light">
                    <h2 class="mx-4" style="margin-top:30px;margin-bottom:30px">Cornelia</h2>
                </div>
                @if(auth()->user()->role_id === 1)
                @include('superadmin.superadmin_sidebar')
                @elseif(auth()->user()->role_id === 2)
                    @include('admin.admin_sidebar')
                @else
                    @include('user.user_sidebar')
                @endif
            </div>
    
            <!-- Main Panel -->
            <div class="bg-light d-flex justify-content-center vw-100" style="margin-left: 250px; background-color:#F8F6F8">
                <div class="w-100 mx-5 my-4">
                    @yield('content')
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
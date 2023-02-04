<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex,nofollow">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Document</title>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">DIM Kelompok 2</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'dashboard.index') active @endif" href="{{ route('dashboard.index') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'access.index') active @endif" href="{{ route('access.index') }}">Manage Hak Akses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'user.index') active @endif" href="{{ route('user.index') }}">Manage Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Route::currentRouteName() === 'product.index') active @endif" href="{{ route('product.index') }}">Manage Barang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @if (session('message'))
        <script> jQuery(function() { $('.toast-success').toast('show') }) </script>
        <div class="toast-container position-absolute top-0 end-0 p-3" style="z-index: 999">
            <div class="toast toast-success align-items-center text-white bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('message') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
        @if (session('error'))
        <script> $(function() { $('.toast-error').toast('show') }) </script>
        <div class="toast-container position-absolute top-0 end-0 p-3" style="z-index: 999">
            <div class="toast toast-error align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif

        @yield('content')

        <footer class="mt-3 mb-5 text-center">
            <p class="text-center">&copy; 2023 Kelompok 2 Data and Information Management</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>        
    </body>
</html>
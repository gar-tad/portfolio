<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $APP_NAME }} @yield('title')</title>
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-sm  navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ $APP_NAME }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminMainNavbar" aria-controls="adminMainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="adminMainNavbar">
                    <ul class="navbar-nav w-100 mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ ($ROUTE_NAME === 'admin.dashboard') ? 'active' : '' }}"
                               href="{{ route('admin.dashboard') }}"
                            >Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ($ROUTE_NAME === 'products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">Products</a>
                        </li>
                        <li class="nav-item ms-sm-auto">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</div>

<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>

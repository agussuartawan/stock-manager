<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/main/app-dark.css">

    <link rel="shortcut icon" href="/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/png">
    @livewireStyles
    @stack('css')
</head>

<body>
    <div id="app">
        @include('include.sidebar')
        <div id="main" class='layout-navbar'>
            @include('include.header')

            <div id="main-content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
    @stack('js')
</body>

</html>

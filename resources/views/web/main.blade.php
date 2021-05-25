<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <script src="{{mix('js/app.js')}}"></script>
    @stack('styles')
    @stack('head-scripts')
</head>
<body>
    @include('web.components.nav')
    <div class="max-w-7xl mx-auto pl-2 py-6">
        @yield('content')
    </div>
</body>
</html>
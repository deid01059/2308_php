<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Board')</title>
</head>
<body>
    @include('layout.header')
    @yield('main')
    @include('layout.footer')
</body>
</html>
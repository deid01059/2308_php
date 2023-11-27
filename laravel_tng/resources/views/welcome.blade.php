<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>그린.GG</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="/css/tng.css">
</head>
<body>
    <div id="app">
        <My-Header-Component :laravel-Data="{{ $headerdata }}"></My-Header-Component>
        <App-Component :laravel-Data="{{ $data }}"></App-Component>
    </div>
</body>
</html>
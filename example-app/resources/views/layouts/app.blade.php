<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Name - @yield('title')</title>

    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    @section('header')


        <a href="/">Home</a>
    @show

    <div class="container">
        @yield('content')
    </div>
</body>
</html>





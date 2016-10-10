<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">

        <title>Malo's Over-Engineered Coffee Thing</title>
        @yield('head')
    </head>
    <body>
        @yield('content')
        @include('footer')
        <script src="js/app.js"></script>
    </body>
</html>

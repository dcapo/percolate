<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700"
            rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"
            rel="stylesheet">
        <link rel="stylesheet" href="css/app.css">

        <title>Malo's Over-Engineered Coffee Thing</title>

        @yield('head')
    </head>
    <body>
        <div id="app">
            @include('partials.navigation')
            <div class="main-content container">
                @yield('content')
            </div>
            @include('partials.footer')
        </div>
        <script src="js/app.js"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LaraNote</title>
        <link rel="stylesheet" href="./css/app.css">
    </head>
    <body>
        <div class="header">
            <div class="header-buttons">
                <button onclick="window.location='{{ route("home") }}'">Logout</button>
            </div>

        </div>
        @yield('content')

    <body>
   <script type="text/javascript" src="js/app.js"></script>
</html>

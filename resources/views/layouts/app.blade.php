<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>App</title>
        <link rel="stylesheet" href="./css/app.css">
    </head>
    <body>
        <div class="header">
            <div class="header-logo">
               <h2 onclick="window.location='{{ route("home") }}'">AppName</h2> 
            </div>
            
            <div class="header-buttons">
                <button onclick="window.location='{{ route("login") }}'">Login</button>
                <button onclick="window.location='{{ route("register") }}'">Register</button>
            </div>
            
        </div>
        @yield('content')
        
    <body>
   <script type="text/javascript" src="js/app.js"></script>
</html>
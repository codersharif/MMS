<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Meal Management System</title>
        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div>
            @component('components.email.bodyData',compact('user_id')) @endcomponent
        </div>
    </body>
</html>

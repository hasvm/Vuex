<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <script src="js/assets/plugins/jquery/jquery-3.6.3.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <script src="js/assets/plugins/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </head>
    <body class="bg-gray-50">
        <div id="app">
            <home></home>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

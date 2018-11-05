<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Secret Santa Claus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Generate your Free Secret Santa List, and include as many people as you want.
    Use My Secret Santa Claus for school, work or family. Merry Christmas!">
<link href="/assets/favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

</head>
<body>

<div class="wrapper">

    @yield('header')

    <section>
    <!-- Main content -->

        @yield('content')

    </section>

    @include('partials._flash')
    @yield('footer')

</div>


</body>
</html>

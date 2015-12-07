<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Secret Santa - Thank you</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/app.css">
<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="wrapper">


<div class="header"> </div>


<div class="content">

    <div class="row">

        <div class="col-md-6 col-md-offset-3">


<div class="row">
    <div class="col-md-6">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>


            <div class="santa">
            <hr/>
                <h1>Secret Santa</h1>

                <span>Your Secret Santa list has been generated.</span><p/>
                <span>Everyone in your group has been notified by email.</span>

                <h1>Merry Christmas</h1>

                <hr/>
                <a class="btn" href="/" style="color: white;padding-left: 10px;" >Create a new list</a>

            </div>

        </div>

    </div>

</div>


<div class="footer"> </div>



</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
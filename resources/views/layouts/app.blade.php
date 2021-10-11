<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <title>@yield('title') - Make the Docs</title>

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

    @section('main')
        <div class="container">
            <h1>This is the layout without being changed</h1>
        </div>
    @show


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>

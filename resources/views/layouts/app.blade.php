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
    <script src="{{asset('assets/js/feather.min.js')}}"></script>

    @yield('script')
</head>
<body style="height: 100vh; width: 100%;">

@section('main')
    <div class="m-0 p-0 h-100 d-flex d-flex-row">

        @section('sidebar')
            @include('layouts/components/sidebar')
        @show


        <main class="container-fluid h-100 p-4">
            @section('container')
                @include('layouts/components/main')
            @show
        </main>


    </div>
@show


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>

@yield('script-footer')


<script src="{{asset('assets/js/main.js')}}" type="module"></script>
</body>
</html>

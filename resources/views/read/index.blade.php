@extends('layouts/app')


@section('title', 'Read')


@section('container')
    @parent

    Hello world
    <section class="container">
        <div class="input-group">
            <input type="search" class="form-control">
            <span class="input-group-text"><i data-feather="search"></i></span>
        </div>

        <div class="container">
            <ul>
                @foreach($files as $file)
                    <li>{{$file}}</li>
                @endforeach
            </ul>

        </div>
        <div class="container">
            <ul>
                @foreach($repos as $repo)
                    <li>{{$repo}}</li>
                @endforeach
            </ul>

        </div>
    </section>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/markdown-it@10.0.0/dist/markdown-it.min.js" type="text/javascript"></script>
@endsection

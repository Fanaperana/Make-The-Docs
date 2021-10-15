@extends('layouts/app')


@section('title', 'Home')


@section('container')
    @parent
    <hr>
    Hello world
    <section class="container">
        <div class="input-group">
            <input type="search" class="form-control">
            <span class="input-group-text"><i data-feather="search"></i></span>
        </div>
    </section>
@endsection

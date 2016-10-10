@extends('app')

@section('content')

<div class="container">
    @yield('title')
    @include ('errors.list')
    @yield('form')
</div>

@stop

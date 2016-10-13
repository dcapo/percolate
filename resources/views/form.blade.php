@extends('app')

@section('content')
    @yield('title')
    @include ('errors.list')
    @yield('form')
@stop

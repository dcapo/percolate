@extends('form')

@section('title')
    @include('partials.title', ['title' => 'New Roast'])
@stop

@section('form')

    {!! Form::open(['action' => 'RoastsController@store']) !!}

        @include ('roasts.form')

    {!! Form::close() !!}

@stop

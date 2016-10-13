@extends('form')

@section('title')
    @include('partials.title', ['title' => 'New Tasting'])
@stop

@section('form')

    {!! Form::open(['action' => 'TastingsController@store']) !!}

        @include ('tastings.form')

    {!! Form::close() !!}

@stop

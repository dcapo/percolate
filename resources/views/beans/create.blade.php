@extends('form')

@section('title')
    @include('partials.title', ['title' => 'New Bean'])
@stop

@section('form')

    {!! Form::open(['action' => 'BeansController@store']) !!}

        @include ('beans.form')

    {!! Form::close() !!}

@stop

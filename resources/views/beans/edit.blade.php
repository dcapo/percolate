@extends('form')

@section('title')
    @include('partials.title', ['title' => "Edit Bean"])
@stop

@section('form')

        {!! Form::model($bean, [
                'method' => 'PATCH',
                'action' => ['BeansController@update', $bean->id]
            ])
        !!}
            @include ('beans.form')
        {!! Form::close() !!}

@stop

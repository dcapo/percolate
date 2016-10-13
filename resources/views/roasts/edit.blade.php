@extends('form')

@section('title')
    @include('partials.title', ['title' => "Edit Roast"])
@stop

@section('form')

        {!! Form::model($roast, [
                'method' => 'PATCH',
                'action' => ['RoastsController@update', $roast->id]
            ])
        !!}
            @include ('roasts.form')
        {!! Form::close() !!}

@stop

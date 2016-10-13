@extends('form')

@section('title')
    @include('partials.title', ['title' => "Edit Tasting"])
@stop

@section('form')

        {!! Form::model($tasting, [
                'method' => 'PATCH',
                'action' => ['TastingsController@update', $tasting->id]
            ])
        !!}
            @include ('tastings.form')
        {!! Form::close() !!}

@stop

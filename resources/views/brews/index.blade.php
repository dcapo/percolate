@extends('app')

@section('navigation/brews/is-active')
    is-active
@stop

@section('content')
    @include('partials.title', ['title' => 'Brews'])
    @include('flash::message')
    <table class="table">
        <thead>
            <tr>
                <th>Brew Date</th>
                <th>Bean</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($brews as $brew)
                <tr>
                    <td>{{ $brew->brewed_at }}</td>
                    <td>{{ $brew->roast ? $brew->roast->bean->name : "Unknown" }}</td>
                    <td class="is-icon">
                    <a class="icon" href="{{ route('brews.edit', $brew->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td class="is-icon">
                        @include('partials.delete_button_form', [
                            'action' => [
                                'BrewsController@destroy',
                                $brew->id
                            ]
                        ])
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No brews!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop

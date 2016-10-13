@extends('app')

@section('navigation/roasts/is-active')
    is-active
@stop

@section('content')
    @include('partials.title', ['title' => 'Roasts'])
    @include('flash::message')
    @include('partials.add_new', [
        'buttonText' => 'Add Roast',
        'route' => route('roasts.create')
        ])
    <table class="table">
        <thead>
            <tr>
                <th>Roasting Date</th>
                <th>Bean</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roasts as $roast)
                <tr>
                    <td>{{ $roast->roasted_at }}</td>
                    <td>{{ $roast->bean->name }}</td>
                    <td class="is-icon">
                    <a class="icon" href="{{ route('roasts.edit', $roast->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td class="is-icon">
                        @include('partials.delete_button_form', [
                            'action' => [
                                'RoastsController@destroy',
                                $roast->id
                            ]
                        ])
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No roasts!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop

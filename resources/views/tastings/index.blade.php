@extends('app')

@section('navigation/tastings/is-active')
    is-active
@stop

@section('content')
    @include('partials.title', ['title' => 'Tastings'])

    @include('flash::message')
    @include('partials.add_new', [
        'buttonText' => 'Add Tasting',
        'route' => route('tastings.create')
    ])
    <table class="table">
        <thead>
            <tr>
                <th>Tasting Date</th>
                <th>Roast Date</th>
                <th>Brew Style</th>
                <th>Bean</th>
                <th>Overall Score</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tastings as $tasting)
                <tr>
                    <td>{{ $tasting->tasted_at }}</td>
                    <td>{{ $tasting->brew->roast->roasted_at }}</td>
                    <td>{{ $tasting->brew->style->name }}</td>
                    <td>{{ $tasting->brew->roast->bean->name }}</td>
                    <td>{{ $tasting->overall_score }}</td>
                    <td class="is-icon">
                        <a class="icon"
                            href="{{ route('tastings.edit', $tasting->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td class="is-icon">
                        @include('partials.delete_button_form', [
                            'action' => [
                                'TastingsController@destroy',
                                $tasting->id
                            ]
                        ])
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No tastings!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop

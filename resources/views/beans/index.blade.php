@extends('app')

@section('navigation/beans/is-active')
    is-active
@stop

@section('content')
    @include('partials.title', ['title' => 'Beans'])
    @include('flash::message')
    @include('partials.add_new', [
        'buttonText' => 'Add Bean',
        'route' => route('beans.create')
        ])
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Region</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beans as $bean)
                <tr>
                    <td>{{ $bean->name }}</td>
                    <td>{{ $bean->origin }}</td>
                    <td class="is-icon">
                        <a class="icon" href="{{ route('beans.edit', $bean->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td class="is-icon">
                        @include('partials.delete_button_form', [
                            'action' => [
                                'BeansController@destroy',
                                $bean->id
                            ]
                        ])
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No beans!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop

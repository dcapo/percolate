@extends('form')

@section('title')
    @include('partials.title', ['title' => "Edit Brew"])
@stop

@section('form')

        {!! Form::model($brew, [
                'method' => 'PATCH',
                'action' => ['BrewsController@update', $brew->id]
            ])
        !!}
            <label class="label">Brew Date</label>
            <p class="control">
                {!! Form::text('brewed_at', null, ['class' => 'input is-medium']) !!}
            </p>

            <label class="label">Roast</label>
            <p class="control">
                <span class="select is-medium">
                    <select class="select is-medium" name="roast_id">
                        @foreach ($roasts as $roast)
                            <option value="{{ $roast->id }}"
                                @if (isset($brew->roast) &&
                                    $brew->roast_id === $roast->id)
                                    selected
                                @endif>
                                {{ $roast->name }}
                            </option>
                        @endforeach
                    </select>
                </span>
            </p>

            <label class="label">Style</label>
            <p class="control">
                <span class="select is-medium">
                    <select class="select is-medium" name="brew_style_id">
                        @foreach ($styles as $style)
                            <option value="{{ $style->id }}"
                                @if ($brew->brew_style_id === $style->id)
                                    selected
                                @endif>
                                {{ $style->name }}
                            </option>
                        @endforeach
                    </select>
                </span>
            </p>

            <label for="fine" class="label">Grind Fine</label>
            <p class="control">
                {!! Form::text('fine', null, ['class' => 'input is-medium']) !!}
            </p>

            <label for="finer" class="label">Grind Finer</label>
            <p class="control">
                {!! Form::text('finer', null, ['class' => 'input is-medium']) !!}
            </p>

            <p class="control">
                {!!
                    Form::submit('Save',
                    ['class' => 'button is-primary is-medium'])
                !!}
            </p>
        {!! Form::close() !!}

@stop

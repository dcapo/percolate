{!! Form::label('name', 'Name:', ['class' => 'label']) !!}
<p class="control">
    {!! Form::text('name', null, ['class' => 'input is-medium']) !!}
</p>

{!! Form::label('origin', 'Origin:', ['class' => 'label']) !!}
<p class="control">
    {!! Form::text('origin', null, ['class' => 'input is-medium']) !!}
</p>

<p class="control">
    {!!
        Form::submit('Save',
        ['class' => 'button is-primary is-medium'])
    !!}
</p>


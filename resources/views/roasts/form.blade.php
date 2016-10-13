<label for="roasted_at" class="label">Roasting Date</label>
<p class="control">
    <pikaday name="roasted_at"
        {{ isset($roast) ? ":value='{$roast->roasted_at}'" : '' }}>
    </pikaday>
</p>


<label for="bean_id" class="label">Bean</label>
<p class="control">
    <span class="select is-medium">
        <select class="select is-medium" name="bean_id" id="bean_id">
            @foreach ($beans as $bean)
                <option value="{{ $bean->id }}"
                    @if (isset($roast) && $roast->bean_id === $bean->id)
                        selected
                    @endif>
                    {{ $bean->name }}
                </option>
            @endforeach
        </select>
    </span>
</p>

<label for="drying_time" class="label">Drying Time</label>
<p class="control">
    {!! Form::text('drying_time', null, [
        'class' => 'input is-medium',
        'placeholder' => '00:00:00'
    ]) !!}
</p>

<label for="maillard_time" class="label">Maillard Time</label>
<p class="control">
    {!! Form::text('maillard_time', null, [
        'class' => 'input is-medium',
        'placeholder' => '00:00:00'
    ]) !!}
</p>

<label for="development_time" class="label">Development Time</label>
<p class="control">
    {!! Form::text('development_time', null, [
        'class' => 'input is-medium',
        'placeholder' => '00:00:00'
    ]) !!}
</p>

<label for="drop_temperature" class="label">Drop Temperature</label>
<p class="control">
    {!! Form::text('drop_temperature', null, ['class' => 'input is-medium']) !!}
</p>

<p class="control">
    {!!
        Form::submit('Save',
        ['class' => 'button is-primary is-medium'])
    !!}
</p>

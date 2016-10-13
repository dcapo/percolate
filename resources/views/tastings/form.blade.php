<label for="tasted_at" class="label">Tasting Date</label>
<p class="control">
    <pikaday name="tasted_at"
        {{ isset($tasting) ? ":value='{$tasting->tasted_at}'" : '' }}>
    </pikaday>
</p>

<label for="user_id" class="label">Taster</label>
<p class="control">
    <span class="select is-medium">
        <select name="user_id" id="user_id">
            @foreach ($users as $id => $name)
                <option value="{{ $id }}"
                    @if (isset($tasting) && $tasting->user_id === $id)
                        selected
                    @endif>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </span>
</p>

<label for="brew_id" class="label">Brew</label>
<p class="control">
    <span class="select is-medium">
        <select name="brew_id" id="brew_id">
            @foreach ($brews as $brew)
                <option value="{{ $brew->id }}"
                    @if (isset($tasting) && $tasting->brew_id === $brew->id)
                        selected
                    @endif>
                    {{ $brew->brewed_at }} - {{ $brew->roast->bean->name }} - {{ $brew->style->name }}
                </option>
            @endforeach
        </select>
    </span>
</p>

<label for="overall_score" class="label">Overall Score</label>
<p class="control">
    {!! Form::text('overall_score', null, ['class' => 'input is-medium']) !!}
</p>

<tasting-radar></tasting-radar>

<p class="control">
    {!!
        Form::submit('Save',
        ['class' => 'button is-primary is-medium'])
    !!}
</p>


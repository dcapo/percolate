{!! Form::open([
        'method' => 'DELETE',
        'action' => $action
    ])
!!}
    <button type="submit" class="icon delete-button">
        <i class="fa fa-trash"></i>
    </button>
{!! Form::close() !!}

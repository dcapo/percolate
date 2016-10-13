@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])
    @else
        <div class="notification
                    is-{{ session('flash_notification.level') }}
                    {{ session()->has('flash_notification.important') ?
                       'notification-important' : ''
                    }}">
            @if(session()->has('flash_notification.important'))
                <button class="delete" onclick="this.parentElement.style.display = 'none'"></button>
            @endif

            {!! session('flash_notification.message') !!}
        </div>
    @endif
@endif

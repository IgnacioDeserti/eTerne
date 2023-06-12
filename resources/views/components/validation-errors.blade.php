@if ($errors->any())
    <div class="error-container" {{ $attributes }}>
        <div class="error-title">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@props(['messages'])

@if ($messages)
        @foreach ((array) $messages as $message)
        <div class="alert alert-danger mt-1" role="alert">{{ $message }}</div>
        @endforeach
@endif

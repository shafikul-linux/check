@props([
    'submit',
    'action',
    'method' => 'POST',
    'fields' => [],
    'formInsideWrapperStart' => '',
    'formInsideWrapperEnd' => '',
])

<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}" {{ $attributes }}>

    <!-- Method & CSRF -->
    @csrf
    @unless (in_array($method, ['GET', 'POST']))
        @method($method)
    @endunless

    <!-- Total Input Wrapper Start -->
    @if ($formInsideWrapperStart)
        {!! $formInsideWrapperStart !!}
    @endif

    @foreach ($fields as $field)
        <!-- Input & Wrapper Start -->
        @if (isset($field['inputWrapperStart']))
            {!! $field['inputWrapperStart'] !!}
        @endif

        <!-- Input Label -->
        @if (isset($field['label']))
            @if ($field['type'] != 'hidden')
                <label for="{{ $field['id'] }}" class="{{ $field['label']['class'] }}">{!! $field['label']['name'] !!}</label>
            @endif
        @endif

        @php
            $errorClass = null;
        @endphp
        <!-- Input -->
        <input type="{{ $field['type'] }}" name="{{ $field['name'] }}"
            @if (isset($field['id'])) id="{{ $field['id'] }}" @endif
            @if (isset($field['placeholder'])) placeholder="{{ $field['placeholder'] }}" @endif
            @if (isset($field['value'])) value="{{ $field['value'] }}"
                @else
                    value="{{ old($field['name']) }}" @endif

            @if (isset($field['class'])) 
               {{ $errorClass .= $field['class'] }}
            @endif

            @error($field['name'])
                {{ $errorClass .= ' is-invalid ' }}
            @enderror
            class="{{ $errorClass }}" />

        <!-- Input Error -->
        @error($field['name'])
            <p class="" style="text-shadow:3px 5px 4px red">{{ $message }}</p>
        @enderror


        <!-- Input & Wrapper End -->
        @if (isset($field['inputWrapperEnd']))
            {!! $field['inputWrapperEnd'] !!}
        @endif
    @endforeach


    {{ $slot }}
    <!-- Total Input Wrapper End -->
    @if ($formInsideWrapperEnd)
        {!! $formInsideWrapperEnd !!}
    @endif
</form>

{{-- removed from use due to issues with format and time selection crashing the interface --}}

@props([
    'options' => "{altFormat:'F j, Y - h:i K', altInput:true, minDate: 'today', defaultDate: null, enableTime: true, }",
    // "{dateFormat:'Y-m-d, H:i:s', altFormat:'F j, Y - h:i K', altInput:true, minDate: 'today', defaultDate: null, enableTime: true, }",
])

<div wire:ignore>
    {{-- <input x-data=" flatpickr($refs.input, {{ $options }})" x-ref="input" type="text" data-input placeholder="Select Event Date & Time"
        class="text-DCG9 text-sm w-full" {{ $attributes }} /> --}}

    <input x-data="{ value: @entangle($attributes->wire('model')), instance: undefined }" x-init="() => {
        $watch('value', value => instance.setDate(value, true))
        instance = flatpickr($refs.input, {{ $options }});
    }" x-ref="input" type="text" data-input {{ $attributes }} />


</div>

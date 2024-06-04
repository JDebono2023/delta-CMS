@props(['active'])

@php
    $classes = $active ?? false ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-D2766 text-left text-base font-semibold font-body text-D2766 bg-D290 focus:outline-none focus:outline-none focus:text-DGC9 focus:bg-DCG1 focus:border-DCG9 transition duration-150 ease-in-out' : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-sm font-medium text-DCG9 hover:bg-DCG1 focus:outline-none focus:bg-DCG1 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
{{-- <a
    {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-left text-sm leading-5 text-DCG9 focus:outline-none focus:border-D2766 hover:bg-D290 transition duration-150 ease-in-out']) }}>{{ $slot }}</a> --}}

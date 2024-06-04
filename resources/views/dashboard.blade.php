<x-app-layout>

    <div class="pb-12 pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="lg:mb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}

            {{-- <div class="max-w-7xl  bg-white md:mt-3 sm:mt-6 "> --}}

            <div>

                @if (Auth::user()->teams->where('id', '=', '1')->first())
                    <x-admindash />
                @else
                    {{-- @livewire('events') --}}
                    <x-clientdash />
                @endif
            </div>
            {{-- </div> --}}

        </div>
    </div>
</x-app-layout>

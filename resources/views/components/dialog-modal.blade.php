@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>

    <div class="px-6 py-3 text-lg font-medium text-gray-900 bg-gray-100 text-left">
        {{ $title }}
    </div>
    <div class=" px-8 sm:px-16 py-4">
        <div class="mt-4 text-xs sm:text-sm text-gray-600">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-2 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-modal>

<div class="">
    {{-- <div class="p-6 lg:p-8 shadow shadow-gray-400 border border-gray-200  bg-gray-200"> --}}

    <x-button class="mb-4" wire:click="createShowModal">
        {{ __('Add A Map') }}
    </x-button>


    {{-- data table --}}
    <div class="flex flex-col bg-DCG1 border">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-lg shadow-gray-400">
                    <table class="  w-full 0">
                        <thead>
                            <tr
                                class="px-6 py-3 bg-D2766 text-xs lg:text-sm leading-4 font-black text-DDW uppercase tracking-wider">
                                <th class="px-6 text-center">
                                    Image</th>
                                <th class="px-6 text-left">
                                    File Name</th>
                                <th class="px-6 text-left">
                                    Map Name</th>
                                <th class="px-6 py-3 text-center">
                                    Floor</th>
                                <th class="px-6 py-3">
                                    Actions</th>

                            </tr>
                        </thead>
                        <tbody class="bg-DDW divide-y divide-DCG3">
                            @if ($maps->count())
                                @foreach ($maps as $item)
                                    <tr class="text-xs xl:text-sm leading-4 tracking-wider text-center text-DCG9 ">
                                        <td class="">
                                            <div class="flex place-content-center ">
                                                <button>
                                                    <img class=" md:h-10 lg:h-16 mx-1 px-1 my-1"
                                                        src="storage/images/{{ $item->image }}"
                                                        wire:click="previewModal({{ $item->id }})">
                                                </button>

                                            </div>
                                        </td>
                                        <td class="px-3 xl:px-6 text-left ">
                                            {{ $item->file_name }}
                                        </td>
                                        <td class="px-3 xl:px-6 text-left ">
                                            {{ $item->map_name }}
                                        </td>
                                        <td class="px-3 xl:px-6text-center ">
                                            {{ $item->floors->floor }}
                                        </td>

                                        <td class="px-1 xl:px-6">

                                            <button
                                                class="material-symbols-outlined  py-3 px-1  text-base md:text-xl leading-4 text-DCG9 tracking-wider text-center  hover:text-DCG3 active:text-DCG3 transition ease-in-out duration-150"
                                                wire:click="updateShowModal({{ $item->id }})">
                                                edit
                                            </button>
                                            <button
                                                class="material-symbols-outlined py-3 px-1  text-base md:text-xl leading-4 text-DCG9 tracking-wider text-center  hover:text-DCG3 active:text-DCG3 transition ease-in-out duration-150"
                                                wire:click="deleteShowModal({{ $item->id }})">
                                                delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results
                                        Found
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="bg-DDW px-4 py-2 mt-1 shadow-md shadow-gray-400">
                    {{ $links->links() }}
                </div>

            </div>
        </div>
    </div>

    {{-- add-edit modal --}}
    <x-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            @if ($modelId)
                {{ __('Update Map') }}
            @else
                {{ __('Add New Map') }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div class=" mt-4">
                <input type="file" wire:model.defer="image"
                    class="text-sm text-grey-500
                file:mr-4 file:py-2 file:px-6
                file:border-0
                file:text-sm file:font-medium
                file:bg-gray-200 file:text-D072
                hover:file:cursor-pointer hover:file:bg-gray-400
                hover:file:text-white focus:border-gray-300 focus:ring-0 mb-4 form-input flex-1 block w-full text-gray-500 transition duration-150 ease-in-out border border-gray-300 p-0 sm:text-sm sm:leading-5"
                    id="upload{{ $iteration }}" />
                <x-input-error for="image" class="mt-2" />
            </div>
            <div class=" my-4">
                @if (!$image)
                    <div class="my-4">
                    </div>
                @elseif($image && !is_string($image))
                    <div class="my-4">
                        <x-label for="image" value="{{ __('Image Preview') }}" />
                        <img src="{{ $image->temporaryUrl() }}">
                    </div>
                @elseif ($modelId)
                    <div class="z-depth-1-half mb-2">
                        <x-label for="image" value="{{ __('Image Preview') }}" />
                        <img src="storage/images/{{ $image }}">
                    </div>
                @endif
            </div>
            <div class="mb-4">
                <x-label for="file_name" class="text-sm" value="{{ __('File Name') }}" />
                <x-input id="file_name" type="text" class="mt-1 block w-full text-xs sm:text-sm"
                    wire:model.defer="file_name" />
                <x-input-error for="file_name" class="mt-2" />
            </div>
            <div class="mb-4">
                <x-label for="map_name" class="text-sm" value="{{ __('Map Name') }}" />
                <x-input id="map_name" type="text" class="mt-1 block w-full text-xs sm:text-sm"
                    wire:model.defer="map_name" />
                <x-input-error for="map_name" class="mt-2" />
            </div>

            <div class=" mt-6">
                <select id="floor_id" name="floor_id"
                    class="form-input border border-gray-300 font-medium text-sm text-gray-700 sm:w-2/3 "
                    wire:model.defer='floor_id'>
                    @if (!$floor_id)
                        <option value="" selected class="">Select Floor...</option>
                        @foreach ($floors as $floor)
                            <option value="{{ $floor->id }}"> {{ $floor->floor }}</option>
                        @endforeach
                    @else
                        @if ($modelId)
                            @foreach ($floors as $floor)
                                <option value="{{ $floor->id }}"
                                    {{ $floor->id == $floor_id ? 'selected="selected"' : '' }}>
                                    {{ $floor->floor }}</option>
                            @endforeach
                        @endif
                    @endif
                </select>
                <x-input-error for="floor_id" class="mt-2" />

            </div>


        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-2" wire:click="close" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>

            @if ($modelId)
                <x-button wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-button>
            @else
                <x-button wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-button>
            @endif

        </x-slot>
    </x-dialog-modal>


    {{-- The Delete Modal --}}
    <x-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Map: ') }}{{ $map_name }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this map? Once deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    {{-- The Image Preview Modal --}}
    <x-dialog-modal wire:model="modalPreviewVisible">
        <x-slot name="title">
            {{ __('Image Preview: ') }}{{ $map_name }}
        </x-slot>

        <x-slot name="content">
            <div class=" my-4 text-sm">

                <div class="z-depth-1-half mb-2 ">
                    {{-- <x-label for="image" value="{{ __('Image Preview') }}" /> --}}
                    <img src="storage/images/{{ $image }}">
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modalPreviewVisible')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>

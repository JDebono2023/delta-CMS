<div class="">


    <x-button class="mb-4" wire:click="createCatModal">
        {{ __('Add An Attraction Category') }}
    </x-button>

    {{-- Attraction Categories Table --}}
    <div class="flex flex-col bg-DDW mb-20">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-1/2 sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-md shadow-gray-400 border">
                    <table class="  w-full 0">
                        <thead>
                            <tr
                                class=" px-6 py-3 bg-D2766 text-xs lg:text-sm leading-4 font-black text-DDW uppercase tracking-wider">
                                <th class="px-10 text-left">
                                    Image</th>
                                <th class="px-2 py-3 text-left">
                                    Category</th>

                                <th class="px-4 text-center">
                                    Actions</th>

                            </tr>
                        </thead>
                        <tbody class="bg-DDW divide-y divide-DCG3">
                            @if ($allCategory->count())
                                @foreach ($allCategory as $item)
                                    <tr class="text-xs lg:text-sm leading-4 tracking-wider text-left text-DCG9 ">
                                        <td class="">
                                            <div class="flex place-content-right">

                                                <img class=" h-2 md:h-3 lg:mx-10 px-1 my-1 "
                                                    src="storage/images/{{ $item->image }}">
                                            </div>
                                        </td>
                                        <td class="px-3 text-left ">
                                            {{ $item->category }}
                                        </td>

                                        <td class="md:px-4 text-center ">

                                            <button
                                                class="material-symbols-outlined py-3 px-1  text-base md:text-xl leading-4 text-DCG9 tracking-wider text-center  hover:text-DCG3 active:text-DCG3 transition ease-in-out duration-150"
                                                wire:click="updateCatModal({{ $item->id }})">
                                                edit
                                            </button>
                                            <button
                                                class="material-symbols-outlined py-3 px-1  text-base md:text-xl leading-4 text-DCG9 tracking-wider text-center  hover:text-DCG3 active:text-DCG3 transition ease-in-out duration-150"
                                                wire:click="deleteCatModal({{ $item->id }})">
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
                {{-- @if ($links->links())
                    {{ $links->links() }}
                @endif --}}




            </div>
        </div>
    </div>

    <x-button class="mb-4" wire:click="createShowModal">
        {{ __('Add An Attraction') }}
    </x-button>
    {{-- data table --}}
    <div class="flex flex-col bg-DCG1 border">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-md shadow-gray-400 border">
                    <table class="  w-full 0">
                        <thead>
                            <tr
                                class=" px-6 py-3 bg-D2766 text-xs lg:text-sm leading-4 font-black text-DDW uppercase tracking-wider">
                                <th class="px-6 text-center">
                                    Image</th>
                                <th class="px-2 py-3 text-left">
                                    Name</th>
                                <th class="px-2 text-left">
                                    Category</th>
                                <th class="px-2 text-left">
                                    Description</th>
                                <th class="px-2 text-left">
                                    Distance</th>
                                <th class="px-2 text-left">
                                    Address</th>
                                <th class="px-2 text-left">
                                    Phone</th>
                                <th class="px-2 text-left">
                                    Website</th>
                                <th class="px-4 text-center">
                                    Actions</th>

                            </tr>
                        </thead>
                        <tbody class="bg-DDW divide-y divide-DCG3">
                            @if ($allAttractions->count())
                                @foreach ($allAttractions as $item)
                                    <tr class="text-xs lg:text-sm leading-4 tracking-wider text-left text-DCG9 ">
                                        <td class="">
                                            <div class="flex place-content-center">
                                                <button>
                                                    <img class="md:h-10 lg:h-16 mx-1 px-1 my-1 "
                                                        src="storage/images/{{ $item->image }}"></button>
                                            </div>
                                        </td>
                                        <td class="px-3 text-left ">
                                            {{ $item->attraction }}
                                        </td>
                                        <td class=" px-2 text-left ">
                                            {{ $item->attractionCategory->category }}
                                        </td>
                                        <td class=" px-2  text-left ">
                                            {{ $item->description }}
                                        </td>
                                        <td class=" px-2 text-left ">
                                            {{ $item->distance }}
                                        </td>
                                        <td class=" px-2 text-left ">
                                            {{ $item->address }}
                                        </td>
                                        <td class=" px-2 text-left ">
                                            {{ $item->phone }}
                                        </td>
                                        <td class=" px-2  text-left ">
                                            {{ $item->website }}
                                        </td>

                                        <td class="px-4 ">

                                            <button
                                                class="material-symbols-outlined py-3 px-1  text-base md:text-xl leading-4 text-DCG9 tracking-wider text-center  hover:text-DCG3 active:text-DCG3 transition ease-in-out duration-150"
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
                {{ __('Update Attraction') }}
            @else
                {{ __('Add A New Attraction') }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div class=" mt-4">
                <input type="file" wire:model.defer="image"
                    class="text-xs text-grey-500
                file:mr-4 file:py-2 file:px-6
                file:border-0
                file:text-sm file:font-medium
                file:bg-gray-200 file:text-D072
                hover:file:cursor-pointer hover:file:bg-gray-400
                hover:file:text-white focus:border-gray-300 focus:ring-0 mb-4 form-input flex-1 block w-full text-gray-500 transition duration-150 ease-in-out border border-gray-300 p-0 sm:text-sm sm:leading-5"
                    id="upload{{ $iteration }}" />
                <x-input-error for="image" class="mt-2" />
            </div>
            <div class=" my-4 text-sm">
                @if (!$image)
                    <div class="my-4">
                    </div>
                @elseif($image && !is_string($image))
                    <div class="my-4">
                        <x-label for="image" value="{{ __('Image Preview') }}" />
                        <img src="{{ $image->temporaryUrl() }}">
                    </div>
                @elseif ($modelId)
                    <div class="z-depth-1-half mb-2 ">
                        <x-label for="image" value="{{ __('Image Preview') }}" />
                        <img src="storage/images/{{ $image }}">
                    </div>
                @endif
            </div>
            <div class="mb-4 ">
                <x-label for="attraction" class="text-sm" value="{{ __('Name') }}" />
                <x-input id="attraction" type="text" class="mt-1 block w-full text-xs sm:text-sm "
                    wire:model.defer="attraction" />
                <x-input-error for="attraction" class="mt-2" />
            </div>

            <div class=" mt-6">
                <select id="attractcat_id" name="attractcat_id"
                    class="border border-gray-300 font-medium text-gray-700 w-full sm:w-2/3 text-sm "
                    wire:model.defer='attractcat_id'>
                    @if (!$attractcat_id)
                        <option value="" selected class="">Select Category...</option>
                        @foreach ($allCategory as $cat)
                            <option value="{{ $cat->id }}"> {{ $cat->category }}</option>
                        @endforeach
                    @else
                        @if ($modelId)
                            @foreach ($allCategory as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $cat->id == $attractcat_id ? 'selected="selected"' : '' }}>
                                    {{ $cat->category }}</option>
                            @endforeach
                        @endif
                    @endif
                </select>
                <x-input-error for="attractcat_id" class="mt-2" />
            </div>

            <div class="mt-4">
                <textarea name="description" rows="5" cols="65" id="description" wire:model.debonce.800ms='description'
                    class="rounded border-gray-300 text-gray-900 shadow-sm resize-none placeholder-gray-400 "
                    placeholder="One or two sentance description." style=""></textarea>
                <x-input-error for="description" class="mt-2" />
            </div>
            <div class="mt-4 ">
                <x-label for="distance" class="text-sm" value="{{ __('Distance (Km or m)') }}" />
                <x-input id="distance" type="text" class="mt-1 block w-full text-xs sm:text-sm "
                    wire:model.defer="distance" />
                <x-input-error for="distance" class="mt-2" />
            </div>
            <div class="mt-4 ">
                <x-label for="address" class="text-sm" value="{{ __('Address') }}" />
                <x-input id="address" type="text" class="mt-1 block w-full text-xs sm:text-sm "
                    wire:model.defer="address" placecholder="123 Main St, London, ON N6A 3E4" />
                <x-input-error for="address" class="mt-2" />
            </div>
            <div class="mt-4 ">
                <x-label for="phone" class="text-sm" value="{{ __('Phone') }}" />
                <x-input id="phone" type="text" class="mt-1 block w-full text-xs sm:text-sm "
                    wire:model.defer="phone" placecholder="(519) 123-4567" />
                <x-input-error for="phone" class="mt-2" />
            </div>
            <div class="mt-4 ">
                <x-label for="website" class="text-sm" value="{{ __('Website') }}" />
                <x-input id="website" type="text" class="mt-1 block w-full text-xs sm:text-sm "
                    wire:model.defer="website" placecholder="www.thiswebsite.com" />
                <x-input-error for="website" class="mt-2" />
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
            {{ __('Delete Attraction: ') }}{{ $attraction }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this attraction? Once deleted, all of its resources and data will be permanently deleted.') }}
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



    {{-- add-edit category modal --}}
    <x-dialog-modal wire:model="modalCategoryVisible">
        <x-slot name="title">
            @if ($modelId)
                {{ __('Update Category') }}
            @else
                {{ __('Add A New Category') }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div class=" mt-4">
                <input type="file" wire:model.defer="cat_image"
                    class="text-xs text-grey-500
                file:mr-4 file:py-2 file:px-6
                file:border-0
                file:text-sm file:font-medium
                file:bg-gray-200 file:text-D072
                hover:file:cursor-pointer hover:file:bg-gray-400
                hover:file:text-white focus:border-gray-300 focus:ring-0 mb-4 form-input flex-1 block w-full text-gray-500 transition duration-150 ease-in-out border border-gray-300 p-0 sm:text-sm sm:leading-5"
                    id="upload{{ $cat_iteration }}" />
                <x-input-error for="cat_image" class="mt-2" />
            </div>
            <div class=" my-4 text-sm">
                @if (!$cat_image)
                    <div class="my-4">
                    </div>
                @elseif($cat_image && !is_string($cat_image))
                    <div class="my-4">
                        <x-label for="cat_image" value="{{ __('Image Preview') }}" />
                        <img src="{{ $cat_image->temporaryUrl() }}">
                    </div>
                @elseif ($modelId)
                    <div class="z-depth-1-half mb-2 ">
                        <x-label for="cat_image" value="{{ __('Image Preview') }}" />
                        <img src="storage/images/{{ $cat_image }}">
                    </div>
                @endif
            </div>
            <div class="mb-4 ">
                <x-label for="category" class="text-sm" value="{{ __('Category Name') }}" />
                <x-input id="category" type="text" class="mt-1 block w-full text-xs sm:text-sm "
                    wire:model.defer="category" />
                <x-input-error for="category" class="mt-2" />
            </div>


        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-2" wire:click="closeCategory" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>

            @if ($modelId)
                <x-button wire:click="updateCategory" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-button>
            @else
                <x-button wire:click="createCategory" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-button>
            @endif

        </x-slot>
    </x-dialog-modal>

    {{-- The Delete Category Modal --}}
    <x-dialog-modal wire:model="modalDeleteCategoryVisible">
        <x-slot name="title">
            {{ __('Delete Category: ') }}{{ $category }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this category? Once deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modalDeleteCategoryVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="deleteCategory" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>

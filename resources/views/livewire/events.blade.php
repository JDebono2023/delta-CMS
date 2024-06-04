<div class="">

    <x-button class="mb-4" wire:click="createShowModal">
        {{ __('Add An Event') }}
    </x-button>


    {{-- data table --}}
    <div class="flex flex-col bg-DCG1 border">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-md shadow-gray-400 border">
                    <table class="table-auto w-full 0">
                        <thead>
                            <tr
                                class="  bg-D2766 text-xs lg:text-sm leading-4 font-black text-DDW uppercase tracking-wider">
                                <th class="px-2 py-2 md:px-6  text-left">
                                    Event Name</th>
                                <th class="px-2 xl:px-6 text-left">
                                    Date</th>
                                <th class="px-2 md:px-6  text-left">
                                    Time</th>
                                <th class="px-2 md:px-6  text-center">
                                    Room</th>
                                <th class="px-2 md:px-6  text-left">
                                    Floor</th>
                                <th class="px-2 md:px-6 text-center">
                                    Visible</th>
                                <th class="px-2 md:px-6 ">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-DDW divide-y divide-DCG3">
                            @if ($events->count())
                                @foreach ($events as $item)
                                    <tr class="text-xs 2xl:text-sm leading-4 tracking-wider text-center ">
                                        <td
                                            class=" px-2
                                        md:pl-6 md:pr-3 text-left">
                                            {{ $item->event_name }}


                                        </td>

                                        <td class="text-left pr-2 pl-2 xl:pl-6 ">
                                            <div class="">
                                                Start:
                                                {{ \Carbon\Carbon::parse($item->starts_at)->format('M d Y') }}
                                            </div>
                                            <div class="">
                                                End: {{ \Carbon\Carbon::parse($item->ends_at)->format('M d Y') }}
                                            </div>

                                        </td>
                                        <td class="text-center xl:pr-3">
                                            <div>
                                                {{ \Carbon\Carbon::parse($item->starts_at)->format('h:i a') }}
                                            </div>
                                            <div>
                                                {{ \Carbon\Carbon::parse($item->ends_at)->format('h:i a') }}
                                            </div>


                                        </td>
                                        <td class="text-center xl:pr-3 ">
                                            {{ $item->eventRoom->room }}
                                        </td>
                                        <td class="text-center px-1">
                                            {{ $item->eventRoom->floors->floor }}
                                        </td>

                                        <td class="text-center ">
                                            @if ($item->visible == 1)
                                                <span class="material-symbols-outlined text-xl ">
                                                    visibility
                                                </span>
                                            @else
                                                <span class="material-symbols-outlined text-xl ">
                                                    visibility_off
                                                </span>
                                            @endif
                                        </td>
                                        <td class=" ">

                                            <button
                                                class="material-symbols-outlined py-3 px-1  text-base md:text-xl leading-4  tracking-wider text-center  hover:text-DCG3 active:text-DCG3 transition ease-in-out duration-150"
                                                wire:click="updateShowModal({{ $item->id }})">
                                                edit
                                            </button>
                                            <button
                                                class="material-symbols-outlined py-3 px-1  text-base md:text-xl leading-4 tracking-wider text-center  hover:text-DCG3 active:text-DCG3 transition ease-in-out duration-150"
                                                wire:click="deleteShowModal({{ $item->id }})">
                                                delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="7">No Results
                                        Found
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                {{-- @if ($links->count() > 5) --}}
                <div class="bg-DDW px-4 py-2 mt-1 shadow-md shadow-gray-400">
                    {{ $links->links() }}
                </div>
                {{-- @endif --}}



            </div>
        </div>
    </div>

    {{-- add-edit modal --}}
    <x-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            @if ($modelId)
                {{ __('Update Event') }}
            @else
                {{ __('Add New Event') }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div class=" mt-4">
                <x-label for="event_name" class="text-sm" value="{{ __('Event Name') }}" />
                <x-input id="event_name" type="text" class="mt-1 block w-full text-xs sm:text-sm "
                    wire:model.defer="event_name" />
                <x-input-error for="event_name" class="mt-2" />
            </div>

            <div class=" mt-6" wire:ignore>
                <select id="room_id" name="room_id"
                    class="border border-gray-300 font-medium text-DCG9 w-full sm:w-2/3 text-sm " wire:model='room_id'>
                    @if (!$room_id)
                        <option class="text-sm ">Select Room...</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" class="text-sm"> {{ $room->room }}
                            </option>
                        @endforeach
                    @else
                        @if ($modelId)
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}"
                                    {{ $room->id == $room_id ? 'selected="selected"' : '' }} class="text-sm">
                                    {{ $room->room }}</option>
                            @endforeach
                        @endif
                    @endif
                </select>
                <x-input-error for="room_id" class="mt-2" />
            </div>
            <div class=" mt-6">
                <div class="mb-4 mt-6 text-sm text-DCG9">I would like this Event to be visible
                    on these dates:
                </div>
                <!-- start date -->
                <div class="grid grid-cols-2 gap-2 mb-10">
                    <div class="">

                        <label class="" for="starts_at">Starts:
                        </label>
                        {{-- <x-datetime-picker wire:model="starts_at"
                            class="border-gray-300 rounded-md shadow-sm w-full " /> --}}
                        <x-input wire:model="starts_at" type="datetime-local" min="{{ $mindate }}" />
                        <x-input-error for="starts_at" class="mt-2" />
                    </div>
                    <!-- end date -->
                    <div class="">

                        <label class="" for="ends_at">Ends:
                        </label>

                        {{-- <x-datetime-picker wire:model="starts_at"
                            class="border-gray-300 rounded-md shadow-sm w-full " /> --}}
                        <x-input wire:model="ends_at" type="datetime-local" min="{{ $mindate }}" />
                        <x-input-error for="ends_at" class="mt-2" />

                    </div>
                </div>
            </div>

            <div class=" mt-6 mb-4">
                <div class="text-sm text-gray-900 flex content-start align-middle">
                    <x-label for="visible" value="" />
                    <x-input id="visible" wire:model.defer='visible' value="1" type="checkbox" name="visible"
                        class=" border-gray-500 text-gray-900 shadow-sm  focus:ring-white focus:border-gray-300 hover:text-gray-700 mr-2 p-2" />
                    Display Event Immediately
                    <x-input-error for="visible" class="mt-2" />
                </div>
                <div class="mt-4 text-sm font-light italic">Selecting "Display Event Immediately" will make this event
                    visible immediately today. Please leave unchecked when an Event is scheduled for future dates.
                </div>
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
            {{ __('Delete Event: ') }}{{ $event_name }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this event? Once deleted, all of its resources and data will be permanently deleted.') }}
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


</div>

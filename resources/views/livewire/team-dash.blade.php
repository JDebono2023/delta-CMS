<div>
    <div class=" grid grid-cols-1 md:grid-cols-3 place-items-center py-10 bg-D2766  ">

        <div class=" w-1/2">
            <x-client-logo />
        </div>

        <div class="md:col-span-2 ">
            <h1
                class=" text-3xl leading-10 md:text-5xl font-semibold text-DDW md:leading-[55px] tracking-wide md:justify-self-left text-center mt-4 md:mt-0 ">
                Team </br> <span class="mt-4">Manager</span>
            </h1>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">


        @if (Auth::user()->teams->where('id', '=', '1')->first())
            <div class="bg-DCG1 p-10 text-sm leading-5">
                <div class="flex items-center ">
                    <x-tni-add-o class="w-6 h-6" />
                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-button class="ml-3">
                            <a href="{{ route('teams.create') }}">
                                {{ __('Create New Team') }}
                            </a>
                        </x-button>
                    @endcan
                </div>
                <p class="mt-4 ml-9 text-gray-500 text-sm leading-relaxed">
                    Add a new team and assign team members.
                </p>
            </div>
            @foreach (Auth::user()->ownedTeams as $teams)
                <div class="bg-DCG1 p-10 text-sm border leading-5">
                    <div class="flex items-center">
                        @can('viewAny', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-tni-cog-o class="w-6 h-6" />
                            <x-button class="ml-3">
                                <a href="{{ route('teams.show', $teams->id) }}">
                                    {{ $teams->name }}
                                </a>

                            </x-button>
                        @endcan
                    </div>
                    <p class="mt-4 ml-9 text-gray-500 text-sm leading-relaxed">
                        View and manage the {{ $teams->name }} team settings and add new users.
                    </p>
                </div>
            @endforeach
        @else
            <div class="bg-D290 p-10 text-sm leading-5 grid grid-cols-4 content-center ">
                <div class="col-span-3  ">
                    <h2 class="font-semibold text-D072 border-b border-DCG9 pb-2 ">
                        Team Manager
                    </h2>
                    <p class="mt-4 text-DCG9">
                        View and manage team settings and user invitations.
                    </p>
                </div>
                <button class="col-span-1 pl-10 place-self-center">
                    <a href="{{ route('teams') }}">
                        <span class="material-symbols-outlined  text-3xl text-D072">
                            move_item
                        </span>
                    </a>
                </button>

            </div>
        @endif




    </div>
</div>

<div class=" shadow-lg">
    <div class=" grid grid-cols-1 md:grid-cols-3 place-items-center py-10 bg-D2766  ">

        <div class=" w-1/2">
            <x-client-logo />
        </div>

        <div class="md:col-span-2 ">
            <h1
                class=" text-3xl leading-10 md:text-5xl font-semibold text-DDW md:leading-[55px] tracking-wide md:justify-self-left text-center mt-4 md:mt-0 font-[Grotesque]">
                Welcome to the</br> <span class="mt-4">Kiosk Dashboard!</span>
            </h1>
        </div>

    </div>
    <div class=" grid grid-cols-1 lg:grid-cols-3 ">


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
                <a href="{{ route('teams.show', 2) }}">
                    <span class="material-symbols-outlined  text-3xl text-D072">
                        move_item
                    </span>
                </a>

            </button>

        </div>

        <div class="bg-D290 p-10 text-sm leading-5 border grid grid-cols-4 content-center ">
            <div class="col-span-3  ">
                <h2 class="font-semibold text-D072 border-b border-DCG9 pb-2 ">
                    User Manager
                </h2>
                <p class="mt-4 text-DCG9">
                    View and manage all users in the database.
                </p>
            </div>
            <button class="col-span-1 pl-10 place-self-center">
                <a href="{{ route('users') }}">
                    <span class="material-symbols-outlined  text-3xl text-D072">
                        move_item
                    </span>
                </a>
            </button>

        </div>


        <div class="bg-D290 p-10 text-sm leading-5 border grid grid-cols-4 content-center ">
            <div class="col-span-3 ">
                <h2 class="font-semibold text-D072 border-b border-DCG9 pb-2 ">
                    Events Scheduler
                </h2>
                <p class="mt-4 text-DCG9 ">
                    View, add, edit, delete client events. Schedule events.
                </p>
            </div>
            <button class="col-span-1 pl-10 place-self-center">
                <a href="{{ route('events') }}">
                    <span class="material-symbols-outlined text-D072 text-3xl">
                        move_item
                    </span>
                </a>
            </button>
        </div>

    </div>
</div>

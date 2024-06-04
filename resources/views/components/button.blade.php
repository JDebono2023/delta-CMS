<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-D2766 mx-3 border border-transparent font-semibold font-body text-xs text-DDW uppercase tracking-widest shadow shadow-gray-800 hover:bg-D072 focus:bg-D072 active:bg-D072 focus:outline-none  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

<nav class="-mx-3 flex flex-1 justify-end gap-x-4">
    @auth
        <a href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Dashboard
        </a>
    @else
        <a href="{{ route('login') }}">
            <button class="text-white border rounded-md px-6 py-[2px]">
                Log in
            </button>
        </a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}">
                <button class="text-white rounded-md px-6 py-1">
                    Register
                </button>
            </a>
        @endif
    @endauth
</nav>

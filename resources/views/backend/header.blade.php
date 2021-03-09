<div class="flex bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="inline-block">
        <h3 class="dark:text-white">Here is Logo </h3>
    </div>
    <div class="inline-block">
        <ul class="flex list-none m-0 p-0">
            <li class="inline-block mx-2"><a href="#" class="dark:text-white">Item 1</a></li>
            <li class="inline-block mx-2"><a href="#" class="dark:text-white">Item 2</a></li>
            <li class="inline-block mx-2"><a href="#" class="dark:text-white">Item 3</a></li>
            <li class="inline-block mx-2"><a href="#" class="dark:text-white">Item 4</a></li>
            <li class="inline-block mx-2"><a href="#" class="dark:text-white">Item 5</a></li>
        </ul>
    </div>
    <div class="inline-block">
        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <h3 class="dark:text-white">Enter</h3>
    </div>
</div>

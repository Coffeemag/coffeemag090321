<div class="flex justify-center bg-gray-900 sm:items-center sm:pt-0">
    <div class="flex">
         @if (auth()->user()->image)
        <img src="{{ asset(auth()->user()->image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
    @endif
    </div>
    <div class="inline-block">
        <ul class="flex list-none m-0 p-0">
            <li class="inline-block mx-6"><a href="#" class="text-white">Item 1</a></li>
            <li class="inline-block mx-6"><a href="#" class="text-white">Item 2</a></li>
            <li class="inline-block mx-6"><a href="#" class="text-white">Item 3</a></li>
            <li class="inline-block mx-6"><a href="#" class="text-white">Item 4</a></li>
            <li class="inline-block mx-6"><a href="#" class="text-white">Item 5</a></li>
        </ul>
    </div>
    <div class="inline-block">
        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 mr-4 mt-2 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-white underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-white underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </div>
</div>

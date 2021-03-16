<div x-data="{ show:false }" class="w-1/6 min-w-screen min-h-screen bg-green-300">
    <div class="flex-auto h-full">
        <div class="flex flex-col overflow-y-auto">
            <ul class="list-none block m-0 p-0 h-full">
                 <li x-on:click="show=!show" class="p-4 w-full relative flex">
                    <div class="mr-4 my-auto">
                        <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"></path>
                        </svg>
                    </div>
                    <div class="flex-auto my-1">
                        <a href="#" class="hover:text-red-900"><span>Users</span></a>
                    </div>
                     <ul class="absolute top-4 left-32" x-show="show" x-on:click.away="show=false">
                         <li class="inline-block"><a class="text-gray-900 hover:text-red-600" href="#">Admin Users</a></li>
                         <li class="inline-block"><a class="text-gray-900 hover:text-red-600" href="#">Roles</a></li>
                         <li class="inline-block"><a class="text-gray-900 hover:text-red-600" href="#">Permissions</a></li>
                     </ul>
                </li>
                <li class="p-4 w-full flex">
                    <div class="mr-4 my-auto">
                        <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 13H5c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2zM7 19c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zM19 3H5c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM7 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"></path>
                        </svg>
                    </div>
                    <div class="flex-auto my-1">
                        <a class="hover:text-red-900" href="#"><span>Settings</span></a>
                    </div>
                </li>
                <li class="p-4 w-full flex">
                    <div class="mr-4 my-auto">
                        <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M7.77 6.76L6.23 5.48.82 12l5.41 6.52 1.54-1.28L3.42 12l4.35-5.24zM7 13h2v-2H7v2zm10-2h-2v2h2v-2zm-6 2h2v-2h-2v2zm6.77-7.52l-1.54 1.28L20.58 12l-4.35 5.24 1.54 1.28L23.18 12l-5.41-6.52z"></path>
                        </svg>
                    </div>
                    <div class="flex-auto my-1">
                        <a class="hover:text-red-900 {{ Route::currentRouteName() == 'backend.categories.index' ? 'active' : '' }}" href="{{ route('backend.categories.index') }}">
                            <span>Categories</span>
                        </a>
                    </div>
                 </li>
            </ul>
        </div>
    </div>
</div>

<div class="w-1/4 h-screen">
    <ul class="list-none  bg-green-500">
        <li><a href="{{ route('dashboard') }}"><span>Dashboard</span></a></li>
        <li class="relative list-none"><a href="#"><span>Users</span></a>
            <ul class="absolute">
                <li class="inline-block"><a class="text-white" href="#">Admin Users</a></li>
                <li class="inline-block"><a class="text-white" href="#">Roles</a></li>
                <li class="inline-block"><a class="text-white" href="#">Permissions</a></li>
            </ul>
        </li>
        <li><a href="#"><span>Settings</span></a></li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'backend.categories.index' ? 'active' : '' }}"
                href="{{ route('admin.categories.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li>
    </ul>
</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="flex flex-row justify-center">
                            <div>
                                <div>
                                    <div><h2 class="font-bold text-indigo-500 text-xl">Profile</h2></div>
                                    <div>
                                        @if (session('status'))
                                            <div role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="container">
                                            <div class="flex flex-row">
                                                <div class="col-12">
                                                    @if ($errors->any())
                                                        <div role="alert">
                                                            <button type="button" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>
                                                                        {{ $error }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="flex flex-row">
                                                            <label class="block font-bold text-lg self-center" for="name">Name</label>
                                                            <div class="my-2 mx-6">
                                                                <input class="w-full leading-3" id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}">
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-row">
                                                            <label class="block font-bold text-lg self-center" for="email">Email</label>
                                                            <div class="my-2 mx-6">
                                                                <input class="w-full leading-3" id="email" type="text" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-row justify-between">
                                                            <label class="block font-bold text-lg self-center" for="profile_image">Profile Image</label>
                                                            <div class="my-2 mx-6">
                                                                <input class="w-full leading-3" id="profile_image" type="file" name="profile_image">
                                                                @if (auth()->user()->image)
                                                                    <code>{{ auth()->user()->image }}</code>
                                                                    <img src="{{ asset(auth()->user()->image) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-row">
                                                            <div class="my-2 mx-6">
                                                                <button class="bg-green-200 rounded hover:bg-green-700 px-2 hover:text-white" type="submit">Update Profile</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

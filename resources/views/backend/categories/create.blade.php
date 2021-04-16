<x-layout title="COFFEEMAG">
    <div class="w-full min-h-screen">
        @include('backend.flash')

        <div class="w-1/4 mx-4 mt-2 bg-gray-100 min-w-screen">
            <div>
                <x-h1_admin>{{ $pageTitle }}</x-h1_admin>
            </div>
        </div>

        <div class="flex mx-4 mt-4 bg-gray-100 min-w-screen">
            <h3 class="mx-2 text-xl text-indigo-700">{{ $subTitle }}</h3>
            <form class="my-2 ml-6" action="{{ route('backend.categories.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="my-2">
                        <label for="name" class="block mb-1 text-left">Name<span class="text-red-500">*</span></label>
                        <input class="leading-3 @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}"/>
                        @error('name') {{ $message }} @enderror
                    </div>
                    <div class="my-2">
                        <label class="block mb-1 text-left" for="description">Description</label>
                        <textarea rows="4" name="description" id="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="my-2">
                        <label class="block mb-1 text-left" for="parent">Parent Category <span class="text-red-500"> *</span></label>
                        <select id=parent class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror" name="parent_id">
                            <option value="0">Select a parent category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                        @error('parent_id') {{ $message }} @enderror
                    </div>
                    <div class="flex flex-row justify-start">
                        <div>
                            <label class="block text-right">
                                <input type="checkbox" id="featured" name="featured"/>Featured Category
                            </label>
                        </div>
                        <div>
                            <label class="block text-left">
                                <input type="checkbox" id="menu" name="menu"/>Show in Menu
                            </label>
                        </div>
                    </div>

                    <div class="my-2">
                        <label class="inline-block text-center">Category Image</label>
                        <input class="inline-block text-center @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                        @error('image') {{ $message }} @enderror
                    </div>
                </div>
                <div class="flex flex-row justify-start">
                    <button type="submit" class="inline-block h-12 p-1 bg-green-300 border border-gray-800 rounded hover:bg-green-600 w-36 hover:text-white">Save Category</button>
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{ route('backend.categories.index') }}" class="inline-block h-12 p-1 text-center bg-green-300 border-2 border-gray-800 rounded w-36 py-auto hover:bg-green-600 hover:text-white">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>

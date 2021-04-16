<x-layout title="{{ $pageTitle }}">
    <div class="w-full min-h-screen">
        <div x-data="{show:false}" class="flex justify-between mx-4 mt-4 min-w-screen">
        @include('backend.flash')
        <div class="w-1/4 mx-4 mt-2 bg-gray-100 min-w-screen">
            <div class="flex items-end justify-between">
                <x-h1_admin>{{ $pageTitle }}</x-h1_admin>
            </div>
        </div>

        <div class="w-full mx-4 mt-4 bg-gray-100 min-w-screen">
            <h3 class="mx-2 text-xl text-indigo-700">{{ $subTitle }}</h3>
            <div class="mx-auto">
                <div>

                    <form class="my-2 ml-6" action="{{ route('backend.categories.update') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="my-2">
                                <label class="block mb-1 text-left" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                                <input class="leading-3 @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $targetCategory->name) }}"/>
                                <input type="hidden" name="id" value="{{ $targetCategory->id }}">
                                @error('name') {{ $message }} @enderror
                            </div>
                            <div class="my-2">
                                <label class="block mb-1 text-left" for="description">Description</label>
                                <textarea class="form-control" rows="4" name="description" id="description">{{ old('description', $targetCategory->description) }}</textarea>
                            </div>
                            <div class="my-2">
                                <label class="block mb-1 text-left" for="parent">Parent Category <span class="m-l-5 text-danger"> *</span></label>
                                <select id=parent class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror" name="parent_id">
                                    <option value="0">Select a parent category</option>
                                    @foreach($categories as $category)
                                        @if ($targetCategory->parent_id == $category->id)
                                            <option value="{{ $category->id }}" selected> {{ $category->name }} </option>
                                        @else
                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('parent_id') {{ $message }} @enderror
                            </div>
                            <div class="my-2">
                                <div class="form-check">
                                    <label class="block mb-1 text-left">
                                        <input class="form-check-input" type="checkbox" id="featured" name="featured"
                                        {{ $targetCategory->featured == 1 ? 'checked' : '' }}
                                        />Featured Category
                                    </label>
                                </div>
                            </div>
                            <div class="my-2">
                                <div class="form-check">
                                    <label class="block mb-1 text-left">
                                        <input class="form-check-input" type="checkbox" id="menu" name="menu"
                                        {{ $targetCategory->menu == 1 ? 'checked' : '' }}
                                        />Show in Menu
                                    </label>
                                </div>
                            </div>
                            <div class="my-2">
                                <div class="row">
                                    <div class="col-md-2">
                                        @if ($targetCategory->image != null)
                                            <figure class="mt-2" style="width: 80px; height: auto;">
                                                <img src="{{ asset($targetCategory->image) }}" id="categoryImage" style="width: 80px; height: 80px; border-radius: 50%;" alt="img">
                                            </figure>
                                        @endif
                                    </div>
                                    <div class="col-md-10">
                                        <label class="control-label">Category Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                        @error('image') {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full py-3">
                            <div class="inline-block mt-2 mr-2">
                            <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-red-400 to-red-600 transform hover:scale-110" type="submit">Update Category</button>
                            &nbsp;&nbsp;&nbsp;
                            </div>
                            <div class="inline-block mt-2 mr-2">
                            <a class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-purple-400 to-purple-600 transform hover:scale-110" href="{{ route('backend.categories.index') }}">
                                Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-layout>

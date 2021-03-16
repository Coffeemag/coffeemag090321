<x-layout title="{{ $pageTitle }}">
    <div class="w-full min-h-screen">
        @include('backend.flash')

        <div class="min-w-screen flex flex-col mx-4 mt-2 bg-gray-100">
            <div class="flex justify-between items-end">
                <x-h1_admin>{{ $pageTitle }}</x-h1_admin>
            </div>
        </div>

        <div class="min-w-screen flex mx-4 mt-4 bg-gray-100">
            <h3 class="text-indigo-700 text-xl mx-2">{{ $subTitle }}</h3>
            <div class="mx-auto">
                <div>

                    <form class="ml-6 my-2" action="{{ route('backend.categories.update') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="my-2">
                                <label class="block text-left mb-1" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                                <input class="leading-3 @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $targetCategory->name) }}"/>
                                <input type="hidden" name="id" value="{{ $targetCategory->id }}">
                                @error('name') {{ $message }} @enderror
                            </div>
                            <div class="my-2">
                                <label class="block text-left mb-1" for="description">Description</label>
                                <textarea class="form-control" rows="4" name="description" id="description">{{ old('description', $targetCategory->description) }}</textarea>
                            </div>
                            <div class="my-2">
                                <label class="block text-left mb-1" for="parent">Parent Category <span class="m-l-5 text-danger"> *</span></label>
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
                                    <label class="block text-left mb-1">
                                        <input class="form-check-input" type="checkbox" id="featured" name="featured"
                                        {{ $targetCategory->featured == 1 ? 'checked' : '' }}
                                        />Featured Category
                                    </label>
                                </div>
                            </div>
                            <div class="my-2">
                                <div class="form-check">
                                    <label class="block text-left mb-1">
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
                                                <img src="{{ asset('public/'.$targetCategory->image) }}" id="categoryImage" class="img-fluid" alt="img">
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
                        <div class="flex flex-row">
                            <button class="inline-block bg-green-300 hover:bg-green-600  h-12 border border-gray-800 hover:text-white p-1 rounded" type="submit">Update Category</button>
                            &nbsp;&nbsp;&nbsp;
                            <a class="inline-block border border-black rounded w-36 text-center pt-3 px-3 bg-green-300 hover:bg-green-600 hover:text-white" href="{{ route('backend.categories.index') }}">
                                Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

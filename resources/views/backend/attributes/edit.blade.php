<x-layout title="COFFEEMAG">
    <div class="w-full min-h-screen">
        @include('backend.flash')
        <div x-data="{show:false}" class="flex justify-between mx-4 mt-4 min-w-screen">
            <div class="w-1/4 mx-4 mt-2 bg-gray-100 min-w-screen">
                <div class="w-full my-2">
                    <x-h1_admin>{{ $pageTitle }}</x-h1_admin>
                    <h3 class="mx-2 text-xl text-indigo-700">{{ $subTitle }}</h3>
                </div>
                <div class="w-full my-4">
                    <ul class="px-4">
                        <li class="my-8"><a class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110" href="#">General</a></li>
                        <li class="my-8"><a class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110" x-on:click ="show=!show" href="#">Attribute Values</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-full mx-4 mt-2 bg-gray-100 min-w-screen">
                <div>
                    <form class="my-2 ml-6" action="{{ route('backend.attributes.update') }}" method="POST" role="form">
                        @csrf
                        <h3 class="mx-2 text-lg text-indigo-700 ">Attribute Information</h3>
                        <div class="mt-8">
                            <div class="my-4">
                                <label for="code">Code</label>
                                <input class="rounded"
                                    type="text"
                                    placeholder="Enter attribute code"
                                    id="code"
                                    name="code"
                                    value="{{ old('code', $attribute->code) }}"
                                />
                            </div>
                            <input type="hidden" name="id" value="{{ $attribute->id }}">
                            <div class="my-4">
                                <label for="name">Name</label>
                                <input class="rounded"
                                    type="text"
                                    placeholder="Enter attribute name"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $attribute->name) }}"
                                />
                            </div>
                            <div class="my-4">
                                <label class="group-hover:bg-green-200" for="frontend_type">Frontend Type</label>
                                @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                                <select name="frontend_type" id="frontend_type" class="rounded">
                                    @foreach($types as $key => $label)
                                        @if ($attribute->frontend_type == $key)
                                            <option value="{{ $key }}" selected>{{ $label }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $label }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="my-4">
                                <div>
                                    <label>
                                        <input  type="checkbox"
                                                id="is_filterable"
                                                name="is_filterable"
                                            {{ $attribute->is_filterable == 1 ? 'checked' : '' }}/>     Filterable
                                    </label>
                                </div>
                            </div>
                            <div class="my-4">
                                <div>
                                    <label>
                                        <input  type="checkbox"
                                                id="is_required"
                                                name="is_required"
                                            {{ $attribute->is_required == 1 ? 'checked' : '' }}/>     Required
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="w-full py-3">
                            <div class="inline-block mt-2 mr-2">
                                <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-red-400 to-red-600 transform hover:scale-110" type="submit">Update Attribute</button>
                            </div>
                            <div class="inline-block mt-2 mr-2">
                                <a class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-purple-400 to-purple-600 transform hover:scale-110" href="{{ route('backend.attributes.index') }}">Go Back</a>
                            </div>
                        </div>
                    </form>
                    </div>

                    <div class="mt-6" x-show="show" x-on:click.away="show=false">
                        <div id="app">
                            <attribute-values attributeid={{ $attribute->id }}></attribute-values>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</x-layout>

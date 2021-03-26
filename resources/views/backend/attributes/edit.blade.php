<x-layout title="COFFEEMAG">
    <div class="w-full min-h-screen">
        @include('backend.flash')
        <div x-data="{show:false}" class="flex justify-between mx-4 mt-4 min-w-screen">
            <div class="mx-4 mt-2 bg-gray-100 min-w-screen">
                <div>
                    <x-h1_admin>{{ $pageTitle }}</x-h1_admin>
                    <h3 class="mx-2 text-xl text-indigo-700">{{ $subTitle }}</h3>
                </div>
                <div>
                    <ul class="flex-column">
                        <li><a href="#">General</a></li>
                        <li><a x-on:click ="show=!show" href="#">Attribute Values</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-full mx-4 mt-2 bg-gray-100 min-w-screen">
                <div class="mx-auto">
                    <div>
                        <form class="my-2 ml-6" action="{{ route('backend.attributes.update') }}" method="POST" role="form">
                            @csrf
                            <h3>Attribute Information</h3>
                            <hr>
                            <div>
                                <div class="group">
                                    <label class="group-hover:bg-green-200" for="code">Code</label>
                                    <input class="group-hover:bg-green-200"
                                        type="text"
                                        placeholder="Enter attribute code"
                                        id="code"
                                        name="code"
                                        value="{{ old('code', $attribute->code) }}"
                                    />
                                </div>
                                <input type="hidden" name="id" value="{{ $attribute->id }}">
                                <div class="group">
                                    <label class="group-hover:bg-green-200" for="name">Name</label>
                                    <input class="group-hover:bg-green-200"
                                        type="text"
                                        placeholder="Enter attribute name"
                                        id="name"
                                        name="name"
                                        value="{{ old('name', $attribute->name) }}"
                                    />
                                </div>
                                <div class="group">
                                    <label class="group-hover:bg-green-200" for="frontend_type">Frontend Type</label>
                                    @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                                    <select name="frontend_type" id="frontend_type" class="group-hover:bg-green-200">
                                        @foreach($types as $key => $label)
                                            @if ($attribute->frontend_type == $key)
                                                <option value="{{ $key }}" selected>{{ $label }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $label }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="group">
                                    <div>
                                        <label class="group-hover:bg-green-200">
                                            <input class="group-hover:bg-green-200"
                                                   type="checkbox"
                                                   id="is_filterable"
                                                   name="is_filterable"
                                                {{ $attribute->is_filterable == 1 ? 'checked' : '' }}/>Filterable
                                        </label>
                                    </div>
                                </div>
                                <div class="group">
                                    <div>
                                        <label class="group-hover:bg-green-200">
                                            <input class="group-hover:bg-green-200"
                                                   type="checkbox"
                                                   id="is_required"
                                                   name="is_required"
                                                {{ $attribute->is_required == 1 ? 'checked' : '' }}/>Required
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div>
                                        <button class="inline-block h-12 p-1 bg-green-300 border border-gray-800 rounded hover:bg-green-600 hover:text-white" type="submit">Update Attribute</button>
                                        <a class="inline-block px-3 pt-3 text-center bg-green-300 border border-black rounded w-36 hover:bg-green-600 hover:text-white" href="{{ route('backend.attributes.index') }}">Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mt-6" x-show="show" x-on:click.away="show=false">
                        @livewire('attribute-values')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<x-layout title="COFFEEMAG">
    <div class="w-full min-h-screen">
        @include('backend.flash')
        <div x-data="{show:false}" class="min-w-screen flex justify-between mx-4 mt-4">
            <div class="min-w-screen mx-4 mt-2 bg-gray-100">
                <div>
                    <x-h1_admin>{{ $pageTitle }}</x-h1_admin>
                    <h3 class="text-indigo-700 text-xl mx-2">{{ $subTitle }}</h3>
                </div>
                <div>
                    <ul class="flex-column">
                        <li><a href="#">General</a></li>
                        <li><a x-on:click ="show=!show" href="#">Attribute Values</a></li>
                    </ul>
                </div>
            </div>
            <div class="min-w-screen w-full mx-4 mt-2 bg-gray-100">
                <div class="mx-auto">
                    <div>
                        <form class="ml-6 my-2" action="{{ route('backend.attributes.update') }}" method="POST" role="form">
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
                                        <button class="inline-block bg-green-300 hover:bg-green-600  h-12 border border-gray-800 hover:text-white p-1 rounded" type="submit">Update Attribute</button>
                                        <a class="inline-block border border-black rounded w-36 text-center pt-3 px-3 bg-green-300 hover:bg-green-600 hover:text-white" href="{{ route('backend.attributes.index') }}">Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mt-6" x-show="show" x-on:click.away="show=false">
                        @livewire('attribute-values',  ['attributeId' =>  $attribute->id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

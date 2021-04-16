<x-layout title="COFFEEMAG">
    <div class="w-full min-h-screen">
        @include('backend.flash')

        <div class="flex flex-col mx-4 mt-2 bg-gray-100 min-w-screen">
            <div class="flex items-end justify-between">
                <x-h1_admin>{{ $pageTitle }}</x-h1_admin>
                <h3 class="mx-2 text-xl text-indigo-700">{{ $subTitle }}</h3>
            </div>
        </div>

        <div class="flex mx-4 mt-4 bg-gray-100 min-w-screen">
            <div class="justify-between mx-4 mt-4 min-w-screen">
                <div class="p-0 tile">
                    <ul class="px-4">
                        <li class="my-8"><a class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110" href="#" data-toggle="tab">General</a></li>
                    </ul>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="general">
                            <div class="tile">
                                <form action="{{ route('backend.attributes.store') }}" method="POST" role="form">
                                    @csrf
                                    <h3 class="tile-title">Attribute Information</h3>
                                    <hr>
                                    <div class="tile-body">
                                        <div class="form-group">
                                            <label class="control-label" for="code">Code</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                placeholder="Enter attribute code"
                                                id="code"
                                                name="code"
                                                value="{{ old('code') }}"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="name">Name</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                placeholder="Enter attribute name"
                                                id="name"
                                                name="name"
                                                value="{{ old('name') }}"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="frontend_type">Frontend Type</label>
                                            @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                                            <select name="frontend_type" id="frontend_type" class="form-control">
                                                @foreach($types as $key => $label)
                                                    <option value="{{ $key }}">{{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="is_filterable" name="is_filterable"/>Filterable
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="is_required" name="is_required"/>Required
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <div>
                                                <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-red-400 to-red-600 transform hover:scale-110" type="submit">Save Attribute</button>
                                                <a class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-purple-400 to-purple-600 transform hover:scale-110" href="{{ route('backend.attributes.index') }}">Go Back</a>
                                            </div>
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
</x-layout>


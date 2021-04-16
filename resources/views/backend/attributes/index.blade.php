<x-layout title="COFFEEMAG">
    <div class="w-full overflow-x-auto">
        @include('backend.flash')
        <div class="flex flex-row justify-between w-full">
            <x-h1_admin>{{ $pageTitle }}</x-h1_admin>
            <span class="text-xl text-indigo-700">{{ $subTitle }}</span>
            <a href="{{ route('backend.attributes.create') }}" class="focus:outline-none text-white text-sm my-4 mr-8 py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110">Add Attribute</a>
        </div>
        <div class="flex items-start justify-center w-full min-h-screen overflow-hidden font-sans bg-gray-100 min-w-screen">
            <table class="w-full mx-4 mt-4 table-auto min-w-max">
                <thead>
                <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-left"> Code </th>
                    <th class="px-6 py-3 text-center"> Name </th>
                    <th class="px-6 py-3 text-center"> Frontend Type </th>
                    <th class="px-6 py-3 text-center"> Filterable </th>
                    <th class="px-6 py-3 text-center"> Required </th>
                    <th style="width:100px; min-width:100px;" class="px-6 py-3 text-center">Action</th>
                </tr>
                </thead>
                <tbody class="text-sm font-light text-gray-600">
                    @foreach($attributes as $attribute)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3 text-left whitespace-nowrap">{{ $attribute->code }}</td>
                            <td class="px-6 py-3 text-left">{{ $attribute->name }}</td>
                            <td class="px-6 py-3 text-center">{{ $attribute->frontend_type }}</td>
                            <td class="px-6 py-3 text-center">
                                @if ($attribute->is_filterable == 1)
                                    <span>Yes</span>
                                @else
                                    <span>No</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-center" >
                                @if ($attribute->is_required == 1)
                                    <span>Yes</span>
                                @else
                                    <span>No</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex justify-center item-center" role="group" aria-label="Second group">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <a href="{{ route('backend.attributes.edit', $attribute->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <a href="{{ route('backend.attributes.delete', $attribute->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>

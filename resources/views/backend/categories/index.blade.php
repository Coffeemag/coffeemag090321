<x-layout title="COFFEEMAG">
    <div class="overflow-x-auto w-5/6">
        @include('backend.flash')
        <div class="w-full flex flex-row justify-between">
            <x-h1_admin>{{ $pageTitle }}</x-h1_admin>
            <span class="text-indigo-700 text-xl">{{ $subTitle }}</span>
            <a href="{{ route('backend.categories.create') }}" class="bg-green-600 shadow-xl text-white my-2 mr-6 rounded">Add Category</a>
        </div>
        <div class="min-w-screen min-h-screen w-full flex items-start justify-center bg-gray-100 font-sans overflow-hidden">

            <table class="min-w-max w-full mx-4 mt-4 table-auto">

                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left"> # </th>
                        <th class="py-3 px-6 text-center"> Name </th>
                        <th class="py-3 px-6 text-center"> Slug </th>
                        <th class="py-3 px-6 text-center"> Parent </th>
                        <th class="py-3 px-6 text-center"> Featured </th>
                        <th class="py-3 px-6 text-center"> Menu </th>
                        <th class="py-3 px-6 text-center"> Order </th>
                        <th class="py-3 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($categories as $category)
                        @if ($category->id != 1)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $category->id }}</td>
                                <td class="py-3 px-6 text-left">{{ $category->name }}</td>
                                <td class="py-3 px-6 text-center">{{ $category->slug }}</td>
                                <td class="py-3 px-6 text-center">{{ $category->parent->name }}</td>
                                <td class="py-3 px-6 text-center">
                                    @if ($category->featured == 1)
                                        <span>Yes</span>
                                    @else
                                        <span>No</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    @if ($category->menu == 1)
                                        <span>Yes</span>
                                    @else
                                        <span>No</span>
                                    @endif
                                </td>
                                <td class="py-3 px-6 text-center">
                                    {{ $category->order }}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ route('backend.categories.edit', $category->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <a href="{{ route('backend.categories.delete', $category->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>

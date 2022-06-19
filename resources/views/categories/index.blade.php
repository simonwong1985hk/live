<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- table from here -->
                <div class="relative overflow-x-auto shadow-md">
                    <div class="flex items-center">
                        <x-link href="{{ route('categories.create') }}" class="m-4">Add new category</x-link>
                        <x-search />
                    </div>
                    @if ($categories->count())
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slug
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $category->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $category->slug }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('categories.edit', $category) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('categories.destroy', $category) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="font=medium text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- table to here -->
                <div class="pagination m-4">
                    {{ $categories->links() }}
                </div>
                @else
                <p class="text-center m-4 font-semibold text-xl text-red-600 leading-tight">No categories found.</p>
                @endif
            </div>
        </div>
</x-app-layout>
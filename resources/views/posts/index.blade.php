<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- table from here -->
                <div class="relative overflow-x-auto shadow-md">
                    <div class="flex items-center">
                        <x-link href="{{ route('posts.create') }}" class="m-4">Add new post</x-link>
                        <x-search />
                    </div>
                    @if ($posts->count())
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slug
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Thumbnail
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Body
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $post->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $post->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $post->slug }}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}" class="w-10">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $post->body }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('posts.edit', $post) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline-block">
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
                    {{ $posts->links() }}
                </div>
                @else
                <p class="text-center m-4 font-semibold text-xl text-gray-800 leading-tight">No posts found.</p>
                @endif
            </div>
        </div>
</x-app-layout>
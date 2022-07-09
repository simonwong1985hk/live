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
                                    Author
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created At
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
                                    {{ $post->author->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $post->category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $post->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 space-y-1">
                                    <x-link href="{{ route('posts.edit', $post) }}">Edit</x-link>
                                    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <x-jet-button type="submit" onclick="return confirm('Are you sure?')">Delete</x-jet-button>
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
                <p class="text-center m-4 font-semibold text-xl text-red-600 leading-tight">No posts found.</p>
                @endif
            </div>
        </div>
</x-app-layout>
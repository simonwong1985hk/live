<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md px-4 py-4">

                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-jet-label for="title" value="{{ __('Title') }}" />
                            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $post->title" required autofocus autocomplete="title" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="slug" value="{{ __('Slug') }}" />
                            <x-jet-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug') ?? $post->slug" required autocomplete="slug" />
                        </div>

                        <div class="mt-4 flex flex-wrap">
                            <div>
                                <x-jet-label for="thumbnail" value="{{ __('Thumbnail') }}" />
                                <x-jet-input id="thumbnail" class="mt-1 text-gray-900 border border-gray-300 cursor-pointer" type="file" name="thumbnail" :value="old('thumbnail', $post->thumbnail)" />
                            </div>
                            <img src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}" class="w-24 rounded mt-2 sm:ml-4 sm:mt-0" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="body" value="{{ __('Body') }}" />
                            <x-textarea id="body" class="block mt-1 w-full" name="body" required autocomplete="body">{{ old('body') ?? $post->body }}</x-textarea>
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="category_id" value="{{ __('Category') }}" />
                            <select id="category_id" name="category_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option selected disabled>Choose a category</option>
                                @foreach (\App\Models\Category::orderBy('name')->get() as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex mt-4">
                            <x-jet-button>
                                {{ __('Update') }}
                            </x-jet-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
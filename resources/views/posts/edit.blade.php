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

                    <form method="POST" action="{{ route('posts.update', $post) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-jet-label for="title" value="{{ __('Title') }}" />
                            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $post->title" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="slug" value="{{ __('Slug') }}" />
                            <x-jet-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug') ?? $post->slug" required autocomplete="slug" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="body" value="{{ __('Body') }}" />
                            <x-textarea id="body" class="block mt-1 w-full" name="body" required autocomplete="body">{{ old('body') ?? $post->body }}</x-textarea>
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
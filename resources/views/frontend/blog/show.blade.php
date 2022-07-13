<x-frontend.layout>
    <div class="container mx-auto px-4 py-4 lg:max-w-screen-sm mt-10">
        <!-- thumbnail -->
        <div class="block bg-cover bg-center bg-no-repeat w-full h-48 mb-5" style="background-image: url('{{ asset($post->thumbnail) }}')"></div>

        <!-- title -->
        <h1 class="mb-5 font-sans text-4xl">
            {{ $post->title }}
        </h1>

        <!-- created at -->
        <div class="flex items-center text-sm">
            {{ $post->created_at->diffForHumans() }}
        </div>

        <!-- body -->
        <div class="mt-5 leading-loose flex flex-col justify-center items-center font-serif">
            {{ $post->body }}
        </div>

        <!-- author -->
        <div class="mt-10 lg:flex items-center p-5 border border-lighter rounded">
            <!-- author avatar -->
            <div class="w-full lg:w-1/6 flex justify-center">
                <img src="{{ $post->author->profile_photo_url }}" class="rounded-full w-24 lg:w-full">
            </div>
            <div class="lg:pl-5 leading-loose text-center lg:text-left w-full lg:w-5/6">
                <!-- author name -->
                By <span class="font-bold">{{ $post->author->name }}</span>
                <div class="text-sm">
                    <!-- author email -->
                    <p class="flex items-center justify-center lg:justify-start">
                        <x-svg.mail class="h-3 mr-1" />
                        <a href="mailto:{{ $post->author->email }}" class="hover:underline">{{ $post->author->email }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-frontend.layout>

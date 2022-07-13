<x-frontend.layout>
    <div class="container mx-auto px-4 lg:max-w-screen-sm">
        @foreach ($posts as $post)
        <a class="no-underline duration-300 block shadow-lg hover:shadow-xl hover:-translate-y-2 w-full mb-10 p-5 rounded" href="{{ route('frontend.blog.show', $post) }}">
            <!-- thumbnail -->
            <div class="block bg-cover bg-center bg-no-repeat w-full h-48 mb-5" style="background-image: url('{{ asset($post->thumbnail) }}')"></div>

            <div class="flex flex-col justify-between flex-1">
                <div>
                    <!-- title -->
                    <h1 class="font-serif block mb-5 text-3xl">
                        {{ $post->title }}
                    </h1>

                    <!-- body -->
                    <p class="mb-5 font-sans leading-loose">
                        {{ Str::words($post->body, 30) }}
                    </p>
                </div>

                <div class="flex items-center text-sm">
                    <!-- author avatar -->
                    <img src="{{ $post->author->profile_photo_url }}" class="w-10 h-10 rounded-full" title="{{ $post->author->name }}">
                    <!-- author name -->
                    <span class="ml-2">{{ $post->author->name }}</span>
                    <!-- created at -->
                    <span class="ml-auto">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </a>
        @endforeach
        <!-- pagination -->
        {{ $posts->links() }}
    </div>
</x-frontend.layout>

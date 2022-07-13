<x-frontend.layout>
    <div class="container mx-auto px-4 py-4 lg:max-w-screen-sm">
        @foreach ($posts as $post)
        <a class="no-underline duration-300 block shadow-lg hover:shadow-xl hover:-translate-y-2 w-full mb-10 p-5 rounded" href="#">
            <!-- thumbnail -->
            <div class="block bg-cover bg-center bg-no-repeat w-full h-48 mb-5" style="background-image: url('{{ $post->thumbnail }}')">
            </div>
            <div class="flex flex-col justify-between flex-1">
                <div>
                    <!-- title -->
                    <h2 class="font-sans leading-normal block mb-6">
                        {{ $post->title }}
                    </h2>

                    <!-- body -->
                    <p class="mb-6 font-serif leading-loose">
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
<x-frontend.layout>
    <div class="container mx-auto px-4 lg:max-w-screen-sm">
        <form method="POST" action="{{ route('frontend.contact.store') }}">
            @csrf

            <!-- name -->
            <div class="mb-7">
                <label for="name" class="text-sm">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()?->name) }}" class="rounded w-full border focus:ring-black @error('name') border-red-500 focus:border-transparent @enderror" />
                @error('name')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <!-- email -->
            <div class="mb-7">
                <label for="email" class="text-sm">{{ __('Email') }}</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()?->email) }}" class="rounded w-full border-none focus:ring-black" />
            </div>

            <!-- message -->
            <div class="mb-7">
                <label for="message" class="text-sm">{{ __('Message') }}</label>
                <textarea name="message" id="message" rows="4" class="rounded w-full border-none focus:ring-black">{{ old('message') }}</textarea>
            </div>

            <!-- submit -->
            <div class="mb-7">
                <button type="submit" class="inline-flex items-center text-black bg-white border border-black rounded px-4 py-1 text-sm hover:text-white hover:bg-black">
                    <x-svg.send class="w-4 mr-2" fill="currentColor" />
                    {{ __('Send') }}
                </button>
            </div>
        </form>
    </div>
</x-frontend.layout>

<div>
    <div class="container mx-auto px-4 lg:max-w-screen-sm">
        <form wire:submit.prevent="send">
            <!-- name -->
            <div class="mb-7">
                <label for="name" class="text-sm">{{ __('Name') }}</label>
                <input type="text" id="name" wire:model="name" class="rounded w-full border-none focus:ring-black" />
                @error('name')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <!-- email -->
            <div class="mb-7">
                <label for="email" class="text-sm">{{ __('Email') }}</label>
                <input type="email" id="email" wire:model="email" class="rounded w-full border-none focus:ring-black" />
                @error('email')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <!-- message -->
            <div class="mb-7">
                <label for="message" class="text-sm">{{ __('Message') }}</label>
                <textarea id="message" wire:model="message" rows="4" class="rounded w-full border-none focus:ring-black"></textarea>
                @error('message')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <!-- submit -->
            <div class="mb-7">
                <button type="submit" class="inline-flex items-center text-black bg-white border border-black rounded px-4 py-1 text-sm hover:text-white hover:bg-black">
                    <x-svg.send class="w-4 mr-2" fill="currentColor" />
                    {{ __('Send') }}
                </button>
                @error('failure')
                <p class="text-red-500 text-sm font-semibold mt-2">{{ $message }}</p>
                @enderror
                @if (session()->has('success'))
                <p class="text-green-500 text-sm font-semibold mt-2">{{ __(session('success')) }}</p>
                @endif
            </div>
        </form>
    </div>
</div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md px-4 py-4">

                    <x-jet-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="profile_photo_path" value="{{ __('Profile Photo') }}" />
                            <x-jet-input id="profile_photo_path" class="mt-1 text-gray-900 border border-gray-300 cursor-pointer" type="file" name="profile_photo_path" :value="old('profile_photo_path')" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="roles" value="{{ __('Roles') }}" />
                            @foreach (\App\Models\Role::orderBy('name')->get() as $role)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" id="{{ $role->name }}" @checked(in_array($role->id, old('roles', []))) class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="{{ $role->name }}" class="ml-2 text-gray-900">{{ $role->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="flex mt-4">
                            <x-jet-button>
                                {{ __('Save') }}
                            </x-jet-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
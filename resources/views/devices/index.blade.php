<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('devices.store') }}">
            @csrf
            <label for="device_location_description">Device location description</label>
            <textarea
                name="device_location_description"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('device_location_description') }}</textarea>
            <x-input-error :messages="$errors->get('device_location_description')" class="mt-2" />
            <label for="device_IP_address">Device IP address</label>
            <textarea
                name="device_IP_address"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('device_IP_address') }}</textarea>
            <x-input-error :messages="$errors->get('device_ip_address')" class="mt-2" />
            <label for="device_IP_port">Device IP port</label>
            <textarea
                name="device_IP_port"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('device_IP_port') }}</textarea>
            <x-input-error :messages="$errors->get('device_IP_port')" class="mt-2" />
            <label for="device_RTU_address">Device RTU address</label>
            <textarea
                name="device_RTU_address"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('device_RTU_address') }}</textarea>
            <x-input-error :messages="$errors->get('device_RTU_address')" class="mt-2" />
            <label for="device_schema">Device schema</label>
            <textarea
                name="device_schema"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('device_schema') }}</textarea>
            <x-input-error :messages="$errors->get('device_schema')" class="mt-2" />
            <label for="site_id">Site</label>
            <select name="site_id" id="site_id" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($sites as $site)
                    <option value="{{ $site->id }}" @if (old('site_id') === $site->id) selected @endif>{{ $site->site_name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('site_id')" class="mt-2" />    
            <label for="image_id">Image</label>
            <select name="image_id" id="image_id" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($images as $image)
                    <option value="{{ $image->id }}" @if (old('image_id') === $image->id) selected @endif>{{ $image->image_name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('image_id')" class="mt-2" />    
            <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        </form>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($devices as $device)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $device->id }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $device->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($device->created_at->eq($device->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('devices.edit', $device)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $device->device_name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
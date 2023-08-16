<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('images.store') }}">
            @csrf
            <label for="product_id">Product Name</label>
            <select name="product_id" id="product_id" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @if (old('product_id') === $product->id) selected @endif>{{ $product->product_name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />    
            <label for="image_protocol">Image Protocol</label>
            <select name="image_protocol" id="image_protocol" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($image_protocols as $protocol)
                    <option value="{{ $protocol }}" @if (old('image_protocol') === $protocol) selected @endif>{{ $protocol }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('image_protocol')" class="mt-2" />
            <label for="image_name">Image Name</label>
            <div class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <textarea
                    name="image_name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-500 rounded-md shadow-sm"
                    readonly
                >(productName + '_' + imageProtocol).toLowerCase().replace(/\s+/g, '_')</textarea>
            </div>
            <label for="image_platform">Image Platform</label>
            <select name="image_platform" id="image_platform" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($image_platforms as $platform)
                    <option value="{{ $platform }}" @if (old('image_platform') === $platform) selected @endif>{{ $platform }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('image_platform')" class="mt-2" />
            <label for="image_deploy">Image deploy command</label>
            <textarea
                name="image_deploy"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-500 rounded-md shadow-sm"
                readonly
            >retrieved from library when image is saved</textarea>
            <x-input-error :messages="$errors->get('image_deploy')" class="mt-2" />
            <label for="image_decomission">Image decomission command</label>
            <textarea
                name="image_decomission"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-500 rounded-md shadow-sm"
                readonly
            >retrieved from library when image is saved</textarea>
            <x-input-error :messages="$errors->get('image_decomission')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Pull') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($images as $image)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $image->product->product_name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $image->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($image->created_at->eq($image->updated_at))
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
                                        <x-dropdown-link :href="route('images.edit', $image)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('images.destroy', $image) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('images.destroy', $image)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $image->image_name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</x-app-layout>

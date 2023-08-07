<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <textarea
                name="product_name"
                placeholder="{{ __('Product name REQUIRED') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_name') }}</textarea>
            <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
            <textarea
                name="product_picture"
                placeholder="{{ __('Product picture file') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_picture') }}</textarea>
            <x-input-error :messages="$errors->get('product_picture')" class="mt-2" />
            <textarea
                name="product_default_protocol"
                placeholder="{{ __('Product default protocol [ Mb_RTU | Mb_TCP | API ] REQUIRED') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_protocol') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_protocol')" class="mt-2" />
            <textarea
                name="product_default_IP_address"
                placeholder="{{ __('Product default IP address') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_IP_address') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_IP_address')" class="mt-2" />
            <textarea
                name="product_default_IP_port"
                placeholder="{{ __('Product default IP port') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_IP_port') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_IP_port')" class="mt-2" />
            <textarea
                name="product_default_RTU_address"
                placeholder="{{ __('Product default Mb RTU address') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_RTU_address') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_RTU_address')" class="mt-2" />
            <textarea
                name="product_default_schema"
                placeholder="{{ __('Product default schema { name: [], multiplier: [], unit: [] } REQUIRED') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_schema') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_schema')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($products as $product)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <small class="ml-2 text-sm text-gray-600">{{ $product->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($product->created_at->eq($product->updated_at))
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
                                        <x-dropdown-link :href="route('products.edit', $product)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('products.destroy', $product)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $product->product_name }}</p>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
</x-app-layout>
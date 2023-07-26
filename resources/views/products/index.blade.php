<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('<models>.store') }}">
            @csrf
            <textarea
                name="<product_name>"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('<product_name>') }}</textarea>
            <x-input-error :messages="$errors->get('<product_name>')" class="mt-2" />
            <textarea
                name="product_picture"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_picture') }}</textarea>
            <x-input-error :messages="$errors->get('product_picture')" class="mt-2" />
            <textarea
                name="product_default_protocol"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_protocol') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_protocol')" class="mt-2" />
            <textarea
                name="product_default_IP_address"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_IP_address') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_IP_address')" class="mt-2" />
            <textarea
                name="product_default_IP_port"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_IP_port') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_IP_port')" class="mt-2" />
            <textarea
                name="product_default_RTU_address"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_RTU_address') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_RTU_address')" class="mt-2" />
            <textarea
                name="product_default_schema"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_schema') }}</textarea>
            <x-input-error :messages="$errors->get('product_default_schema')" class="mt-2" />
            <textarea
                name="image_id"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('image_id') }}</textarea>
            <x-input-error :messages="$errors->get('image_id')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
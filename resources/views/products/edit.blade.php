<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.update', $product) }}">
            @csrf
            @method('patch')
            <textarea
                name="product_name"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_name', $product->product_name) }}</textarea>
            <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                <textarea
                name="product_picture"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_picture', $product->product_picture) }}</textarea>
            <x-input-error :messages="$errors->get('product_picture')" class="mt-2" />
                <textarea
                name="product_default_protocol"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_protocol', $product->product_default_protocol) }}</textarea>
            <x-input-error :messages="$errors->get('product_default_protocol')" class="mt-2" />
                <textarea
                name="product_default_IP_address"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_IP_address', $product->product_default_IP_address) }}</textarea>
            <x-input-error :messages="$errors->get('product_default_IP_address')" class="mt-2" />
                <textarea
                name="product_default_IP_port"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_IP_port', $product->product_default_IP_port) }}</textarea>
            <x-input-error :messages="$errors->get('product_default_IP_port')" class="mt-2" />
                <textarea
                name="product_default_RTU_address"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_RTU_address', $product->product_default_RTU_address) }}</textarea>
            <x-input-error :messages="$errors->get('product_default_RTU_address')" class="mt-2" />
                <textarea
                name="product_default_schema"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_default_schema', $product->product_default_schema) }}</textarea>
            <x-input-error :messages="$errors->get('product_default_schema')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('products.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
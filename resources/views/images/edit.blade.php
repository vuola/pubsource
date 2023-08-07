<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('images.update', $image) }}">
            @csrf
            @method('patch')
            <textarea
                name="image_platform"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('image_platform', $image->image_platform) }}</textarea>
            <x-input-error :messages="$errors->get('image_platform')" class="mt-2" />
                <textarea
                name="image_protocol"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('image_protocol', $image->image_protocol) }}</textarea>
            <x-input-error :messages="$errors->get('image_protocol')" class="mt-2" />
                <textarea
                name="image_name"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('image_name', $image->image_name) }}</textarea>
            <x-input-error :messages="$errors->get('image_name')" class="mt-2" />
                <textarea
                name="image_deploy"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('image_deploy', $image->image_deploy) }}</textarea>
            <x-input-error :messages="$errors->get('image_deploy')" class="mt-2" />
                <textarea
                name="image_decomission"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('image_decomission', $image->image_decomission) }}</textarea>
            <x-input-error :messages="$errors->get('image_decomission')" class="mt-2" />
                <textarea
                name="product_id"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('product_id', $image->product_id) }}</textarea>
            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('products.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
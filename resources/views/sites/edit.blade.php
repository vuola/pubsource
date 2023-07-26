<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('sites.update', $site) }}">
            @csrf
            @method('patch')
            <textarea
                name="site_name"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('Site name', $site->site_name) }}</textarea>
            <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
            <textarea
                name="site_latitude"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('Site latitude', $site->site_latitude) }}</textarea>
            <x-input-error :messages="$errors->get('site_latitude')" class="mt-2" />            
            <textarea
                name="site_longitude"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('Site longitude', $site->site_longitude) }}</textarea>
            <x-input-error :messages="$errors->get('site_longitude')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('sites.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
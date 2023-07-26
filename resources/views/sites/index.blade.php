<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('sites.store') }}">
            @csrf
            <textarea
                name="site_name"
                placeholder="{{ __('Site name') }}"
                class="block w-full mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></textarea>
            <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
            <textarea
                name="site_latitude"
                placeholder="{{ __('Site latitude') }}"
                class="block w-full mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></textarea>
            <x-input-error :messages="$errors->get('site_latitude')" class="mt-2" />
            <textarea
                name="site_longitude"
                placeholder="{{ __('Site longitude') }}"
                class="block w-full mb-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></textarea>
            <x-input-error :messages="$errors->get('site_longitude')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($sites as $site)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $site->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $site->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($site->created_at->eq($site->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @if ($site->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('sites.edit', $site)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('sites.destroy', $site) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('sites.destroy', $site)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $site->site_name }}</p>
                        <p class="mt-4 text-lg text-gray-900">{{ $site->site_longitude }}</p>
                        <p class="mt-4 text-lg text-gray-900">{{ $site->site_latitude }}</p>
                    </div>
                </div>
                <div class="my-4"></div>
            @endforeach
        </div>
    </div>
</x-app-layout>
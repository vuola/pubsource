<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('variables.update', $variable) }}">
            @csrf
            @method('patch')
            <textarea
                name="variable_name"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('variable_name', $variable->variable_name) }}</textarea>
            <x-input-error :messages="$errors->get('variable_name')" class="mt-2" />
            <textarea
                name="variable_multiplier"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('variable_multiplier', $variable->variable_multiplier) }}</textarea>
            <x-input-error :messages="$errors->get('variable_multiplier')" class="mt-2" />
            <textarea
                name="variable_unit"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('variable_unit', $variable->variable_unit) }}</textarea>
            <x-input-error :messages="$errors->get('variable_unit')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('variables.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
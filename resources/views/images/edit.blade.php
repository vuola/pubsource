<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('images.update', $image) }}">
            @csrf
            @method('patch')
            <label for="product_id">Product name</label>
            <select name="product_id" id="product_id" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @if (old('product_id', $image->product_id) === $product->id) selected @endif>{{ $product->product_name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />    
            <label for="image_protocol">Image Protocol</label>
            <select name="image_protocol" id="image_protocol" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($image_protocols as $protocol)
                    <option value="{{ $protocol }}" @if (old('image_protocol', $image->image_protocol) === $protocol) selected @endif>{{ $protocol }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('image_protocol')" class="mt-2" />
            <label for="image_name">Image Name</label>
            <div class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <textarea
                    name="image_name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-500 rounded-md shadow-sm"
                    readonly
                >{{ old('image_name', $image->image_name) }}</textarea>
            </div>
            <x-input-error :messages="$errors->get('image_name')" class="mt-2" />
            <label for="image_platform">Image Platform</label>
            <select name="image_platform" id="image_platform" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($image_platforms as $platform)
                    <option value="{{ $platform }}" @if (old('image_platform', $image->image_platform) === $platform) selected @endif>{{ $platform }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('image_platform')" class="mt-2" />
            <label for="image_deploy">Image deploy command</label>
            <textarea
                name="image_deploy"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-500 rounded-md shadow-sm"
                readonly
                >{{ old('image_deploy', $image->image_deploy) }}</textarea>
            <x-input-error :messages="$errors->get('image_deploy')" class="mt-2" />
            <label for="image_decomission">Image decomission command</label>
            <textarea
                name="image_decomission"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-gray-500 rounded-md shadow-sm"
                readonly
                >{{ old('image_decomission', $image->image_decomission) }}</textarea>
            <x-input-error :messages="$errors->get('image_decomission')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Pull') }}</x-primary-button>
                <a href="{{ route('products.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <script type="text/javascript">
        $(document).ready(function() {
            // References to relevant elements
            const imageProtocolInput = $('#image_protocol');
            const productNameInput = $('#product_name');
            const imageNameInput = $('#image_name');
        
            // Event listener for changes in image_protocol and product_name
            imageProtocolInput.on('change', updateImageName);
            productNameInput.on('change', updateImageName);
        
            // Function to update image_name
            function updateImageName() {
                const imageProtocol = imageProtocolInput.val();
                const productName = productNameInput.val();
                
                // Concatenate, convert to lowercase, and replace spaces with underscores
                const imageName = (productName + '_' + imageProtocol).toLowerCase().replace(/\s+/g, '_');
                imageNameInput.val(imageName);
            }
        });
    </script>    
</x-app-layout>
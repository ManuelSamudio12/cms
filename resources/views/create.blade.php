<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('store.cat') }}" enctype="multipart/form-data">
            @csrf
            <div class="w-full sm:max-w-md p-5 mx-auto">
                <h2 class="mb-12 text-center text-5xl font-extrabold">Register Cat</h2>
                @if ($errors->any())
                    <div class="py-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-4">
                    <label class="block mb-1" for="name">Name</label>
                    <input id="name" type="text" name="name" required placeholder="Name" value="{{ old('name') }}" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1" for="description">Description</label>
                    <input id="description" type="text" name="description" placeholder="Describe your cat" required value="{{ old('name') }}" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1" for="breed">Breed</label>
                    <select id="breed" name="breed" required class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full">
                        <option value="" selected disabled>Choose Breed...</option>
                        @foreach($breeds as $breed)
                            <option value="{{ $breed->id }}">{{ $breed->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-1" for="birthday">Birthday</label>
                    <input id="birthday" type="text" name="birthday" required autocomplete="off" value="{{ old('birthday') }}" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1" for="weight">Weight</label>
                    <input id="weight" type="number" step=".1" name="weight" placeholder="Weight in kilograms" required value="{{ old('weight') }}" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1" for="sex">Sex</label>
                    <select id="sex" name="sex" required class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full">
                        <option value=""selected disabled>Choose ...</option>
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-1" for="address">Address</label>
                    <input id="address" type="text" name="address" required autocomplete="off" placeholder="Address" value="{{ old('address') }}" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1" for="address_latitude">Address Latitude</label>
                    <input id="address_latitude" type="text" name="address_latitude" required autocomplete="off" placeholder="Address Latitude" value="{{ old('address_latitude') }}" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1" for="address_longitude">Address Longitude</label>
                    <input id="address_longitude" type="text" name="address_longitude" required autocomplete="off" placeholder="Address Longitude" value="{{ old('address_longitude') }}" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                </div>

                <div class="mb-4">
                    <label class="block mb-1" for="photo">Photo</label>
                    <input id="photo" type="file" name="photo" accept="image/*" placeholder="Address" value="{{ old('photo') }}" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
                </div>

                <div class="mt-6">
                    <button class="w-full inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition">Create</button>
                </div>

            </div>
        </form>
    </div>

    <script>
        var picker = new Pikaday({
            field: document.getElementById('birthday'),
            format: 'Y-m-d',
            toString(date, format) {
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();
                return `${year}/${month}/${day}`;
            },
            parse(dateString, format) {
                const parts = dateString.split('/');
                const day = parseInt(parts[0], 10);
                const month = parseInt(parts[1], 10) - 1;
                const year = parseInt(parts[2], 10);
                return new Date(year, month, day);
            }
        });

        $(document).ready(function() {
            const breedOldValue = '{{ old('breed') }}';
            const sexOldValue = '{{ old('sex') }}';

            if(breedOldValue !== '') {
                $('#breed').val(breedOldValue);
            }
            if(sexOldValue !== '') {
                $('#sex').val(sexOldValue);
            }
        });

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO8z2XKIsBAlfGLT67uzmqaK0_qGz9Lqg&callback=initAutocomplete&libraries=places&v=weekly" async></script>
    <script>
        let autocomplete;

        function initAutocomplete() {
            address = document.querySelector("#address");

            var autocomplete = new google.maps.places.Autocomplete(address,{
                componentRestrictions: { country: ["pa", "cr"] },
                fields: ["address_components", "geometry"],
                types: ["address"],
            });

            autocomplete.addListener("place_changed", function (){
                var place = autocomplete.getPlace();
                $("#address_latitude").val(place.geometry['location'].lat());
                $("#address_longitude").val(place.geometry['location'].lng());
            });
        }
    </script>

</x-app-layout>

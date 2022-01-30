<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map of Cats') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div id="map" style=""></div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap&libraries=&v=weekly" async></script>
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 600px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
    <script>
        // Initialize and add the map
        function initMap() {
            const panama = { lat: 9.681685587710176, lng: -81.48416282083619 };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: panama,
            });

            @if($locations ?? '')
                var locations = @json($locations ?? '');

                for(let i = 0; i < locations.length; i++){
                    const latLng = new google.maps.LatLng(locations[i][0], locations[i][1]);

                    new google.maps.Marker({
                        position: latLng,
                        map: map,
                    });
                }
            @endif

        }
    </script>
</x-app-layout>

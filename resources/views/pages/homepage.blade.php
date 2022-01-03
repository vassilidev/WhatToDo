@extends('layouts.dashboard')

@section('content')
    <div class="h-100" id="map"></div>
@endsection

@push('js')
    <script src="{{ asset('js/map.js') }}"></script>
    <script>
        map.on('load', function () {
            let url = "{{ route('getMarkers') }}"
            let xhr = new XMLHttpRequest()
            xhr.open('GET', url)

            xhr.onload = function () {
                let locations = JSON.parse(xhr.responseText);
                let features = Array()

                locations.forEach(function (element) {
                    feature = {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [element.long, element.lat]
                        },
                        'properties': {
                            'name': element.name,
                            'description': element.description,
                            'user': element.user,
                        }
                    }
                    features.push(feature)
                })

                map.addSource("locations", {
                    "type": "geojson",
                    "data": {
                        "type": "FeatureCollection",
                        "features": features
                    }
                })

                features.forEach(function (marker) {
                    var url = '{{ route('profile', ':user') }}';
                    url = url.replace(':user', marker.properties.user.username);
                    var popup = new mapboxgl.Popup()
                        .setHTML('<strong>' + marker.properties.name + '</strong>' +
                            '<p>' + marker.properties.description + '</p>' +
                            '<p>' + 'Créer par' + '<a href="' + url + '"> ' +
                            marker.properties.user.username +
                            '</p>');

                    new mapboxgl.Marker()
                        .setLngLat(marker.geometry.coordinates)
                        .setPopup(popup)
                        .addTo(map);
                });
            }
            xhr.send()
        })
    </script>
@endpush

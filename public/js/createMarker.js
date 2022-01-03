const newMarker = new mapboxgl.Marker({draggable: true})
    .setLngLat([0, 0])
    .addTo(map);

newMarker.on('dragend', function (e) {
    setInput(e.target.getLngLat())
})

map.on('click', function (e) {
    var coordinates = e.lngLat;
    newMarker.setLngLat(coordinates)
    setInput(coordinates)
});

const locateMarkerBtn = new MapboxGLButtonControl({
    className: "mapbox-gl-addMarker bi-geo-alt-fill",
    title: "Localiser le marker sur la carte",
    eventHandler: locateMarker
});

function locateMarker(event) {
    map.flyTo({
        center: newMarker.getLngLat()
    })
}

map.addControl(locateMarkerBtn, "bottom-right");

let longInput = document.getElementById('long');
let latInput = document.getElementById('lat');

function setInput({lng, lat}) {
    longInput.value = lng;
    latInput.value = lat;
}

function moveMarker() {
    newMarker.setLngLat([longInput.value, latInput.value])
}

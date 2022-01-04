class MapboxGLButtonControl {
    constructor({
                    className = "",
                    title = "",
                    eventHandler = evtHndlr
                }) {
        this._className = className;
        this._title = title;
        this._eventHandler = eventHandler;
    }

    onAdd(map) {
        this._btn = document.createElement("button");
        this._btn.className = "mapboxgl-ctrl-icon" + " " + this._className;
        this._btn.type = "button";
        this._btn.title = this._title;
        this._btn.onclick = this._eventHandler;

        this._container = document.createElement("div");
        this._container.className = "mapboxgl-ctrl-group mapboxgl-ctrl";
        this._container.appendChild(this._btn);

        return this._container;
    }

    onRemove() {
        this._container.parentNode.removeChild(this._container);
        this._map = undefined;
    }
}

mapboxgl.accessToken = 'pk.eyJ1IjoidmFzc2lsaWRldm5ldCIsImEiOiJja3h2eHBmOTgxcXF1MnBtcGx5ZmU5bnQ2In0.dqxQQsMZHOZFvYNjLYZhWA';

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/dark-v10?optimize=true',
    center: [2.209666999999996, 46.232192999999995],
    zoom: 5
});

map.addControl(new mapboxgl.FullscreenControl({container: document.querySelector('body')}));
map.addControl(new mapboxgl.ScaleControl());

map.addControl(
    new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl,
        collapsed: true,
        minLength: 3,
        limit: 7,
    })
)

map.addControl(
    new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },

        trackUserLocation: true,

        showUserHeading: true
    })
);

map.addControl(new mapboxgl.NavigationControl());

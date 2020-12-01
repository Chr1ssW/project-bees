const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

let myMap = L.map('myMap').setView([52.785804, 6.897585], 13)

L.tileLayer(tilesProvider, {
    maxZoom: 18,
    minZoom: 5,
}).addTo(myMap)

var iconMarker = L.icon({
    iconUrl: '../resources/img/marker.png',
    iconSize: [20,32],
    popupAnchor: [0, -10]
})
L.marker([51.108978, 17.032669]).addTo(myMap).bindPopup('wroclaw');
L.marker([-24.595531, -60.428972]).addTo(myMap).bindPopup('fsa');
L.marker([56.786111, -4.114052]).addTo(myMap).bindPopup('Scotland');
L.marker([52.77818, 6.91211]).addTo(myMap).bindPopup('NL Emmen Van Schaikweg 94');
L.marker([52.78503, 6.90461]).addTo(myMap).bindPopup('NL Emmen De Veenkampen 5');
L.marker([42.977076, 1.568993]).addTo(myMap).bindPopup('cos');

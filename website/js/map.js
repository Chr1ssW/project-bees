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
L.marker([47.61959, 3.36105]).addTo(myMap).bindPopup('test');
L.marker([52.77818, 6.91211]).addTo(myMap).bindPopup('NL, Emmen, Van Schaikweg 94');
L.marker([52.78503, 6.90461]).addTo(myMap).bindPopup('NL, Emmen, De veenkampen 5');

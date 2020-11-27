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
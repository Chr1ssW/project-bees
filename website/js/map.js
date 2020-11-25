const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

let myMap = L.map('myMap').setView([52.785804, 6.897585], 13)

L.tileLayer(tilesProvider, {
    maxZoom: 18,
}).addTo(myMap)

let iconMarker = L.icon({
    iconURL: 'marker.png',
    iconSize: [60,60],
    iconAnchor: [30,60]
})

let marker = L.marker([52.77823, 6.91137], { icon: iconMarkers}).addTo(myMap)


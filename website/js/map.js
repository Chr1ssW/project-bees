const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

let myMap = L.map('myMap').setView([52.77823, 6.91170], 13)

L.tileLayer(tilesProvider, {
    maxZoom: 18,
}).addTo(myMap)
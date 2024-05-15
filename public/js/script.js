console.log('Hello from script.js');

var map = L.map('map').setView([48.688856920786336, 2.18066078674733], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);
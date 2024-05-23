// Is this thing on?
console.log('Hello script.js');

// Leaflet map

var map = L.map('map').setView([49.43693086050762, 1.102400429307783], 16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([49.43693086050762, 1.102400429307783]).addTo(map)
        .bindPopup('Marine <br>⭐⭐⭐⭐⭐ (321 Prestations)<br><button type="button" class="btn btn-primary">Réserver une séance (16,95€)</button>');

    L.marker([49.43693086053762, 1.132400229307783]).addTo(map)
        .bindPopup('Camille <br>⭐⭐⭐ (36 Prestations)<br><button type="button" class="btn btn-primary">Réserver une séance (12,95€)</button>');

    setTimeout(function(){map.invalidateSize(true);},100);

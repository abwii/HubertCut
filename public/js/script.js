console.log('Hello adazdazd script.js');

var map = L.map('map').setView([48.688856920786336, 2.18066078674733], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var marker = L.marker([48.688856920786336, 2.18066078674733]).addTo(map);
    marker.on('click', function() {
        marker.bindPopup('Hello, I am a popup!').openPopup();
    });
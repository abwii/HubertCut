console.log('Hello adazjdazdazd script.js');

var map = L.map('map').setView([49.43693086050762, 1.102400429307783], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var marker = L.marker([49.43693086050762, 1.102400429307783]).addTo(map);
    marker.on('click', function() {
        marker.bindPopup('Hello, I am Marine').openPopup();
    });

    var marker = L.marker([49.43758665623901, 1.1034924859261053]).addTo(map);
    marker.on('click', function() {
        marker.bindPopup('Hospital').openPopup();
    });
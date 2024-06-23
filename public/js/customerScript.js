// This thing on?
console.log('Hello customerScript.js');

// Fonction pour initialiser la carte avec une position par défaut
function initializeMap(latitude = 48.7852297, longitude = 2.3722609) {
    var map = L.map('map').setView([latitude, longitude], 16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([48.7852297, 2.3722609]).addTo(map)
        .bindPopup('Marine <br>⭐⭐⭐⭐⭐ (321 Prestations)<br><button type="button" class="btn btn-primary" onclick="createRdv(cutterId, cutId, locationType)">Réserver une séance (16,95€)</button>');

    setTimeout(function(){ map.invalidateSize(true); }, 100);
}

// Demande la position de l'utilisateur et initialise la carte
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
        function(position) {
            console.log('User position:', position.coords);
            initializeMap(position.coords.latitude, position.coords.longitude);
        },
        function(error) {
            console.error("Erreur lors de l'obtention de la position de l'utilisateur:", error);
            // Utiliser la position par défaut en cas d'erreur
            initializeMap();
        }
    );
} else {
    // Le navigateur ne supporte pas la géolocalisation
    console.warn("La géolocalisation n'est pas supportée par ce navigateur.");
    initializeMap();
}

function updatemap() {
    console.log('Updating map with form data...');

}

function createRdv(cutterId, cutId, locationType) {

    console.log('Creating rendez-vous for cutter', cutterId, 'and cut', cutId, 'at', locationType);

    var formData = new FormData();
    formData.append('cutter_id', cutterId);
    formData.append('cut_id', cutId);
    formData.append('location_type', locationType);

    fetch('/create-rdv', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert('Rendez-vous créé avec succès');
    })
    .catch(error => {
        console.error('Erreur lors de la création du rendez-vous:', error);
        alert('Erreur lors de la création du rendez-vous');
    });
}

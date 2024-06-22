// This thing on?
console.log('Hello customerScript.js');

// Variable globale pour stocker la carte
var map;

// Fonction pour initialiser la carte avec une position par défaut
function initializeMap(latitude = 49.43693086050762, longitude = 1.102400429307783) {
    // Si la carte existe déjà, la réinitialiser
    if (map) {
        map.setView([latitude, longitude], 16);
        return;
    }

    map = L.map('map').setView([latitude, longitude], 16);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([49.43693086050762, 1.102400429307783]).addTo(map)
        .bindPopup('Marine <br>⭐⭐⭐⭐⭐ (321 Prestations)<br><button type="button" class="btn btn-primary" onclick="createRdv(1, 1, \'a_domicile\')">Réserver une séance (16,95€)</button>');

    L.marker([49.43693086053762, 1.132400229307783]).addTo(map)
        .bindPopup('Camille <br>⭐⭐⭐ (36 Prestations)<br><button type="button" class="btn btn-primary" onclick="createRdv(2, 1, \'sur_place\')">Réserver une séance (12,95€)</button>');

    setTimeout(function(){ map.invalidateSize(true); }, 100);
}

// Demande la position de l'utilisateur et initialise la carte
function requestUserLocation() {
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
}

// Initialiser la carte avec la position de l'utilisateur au chargement de la page
requestUserLocation();

function updatemap() {
    console.log('Updating map with form data...');
    requestUserLocation();
}

function createRdv(cutterId, cutId, locationType) {
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

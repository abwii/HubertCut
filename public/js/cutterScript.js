// This thing on?
console.log('Hello cutterScript.js');

function search() {
    console.log('search() called');

    var spinner = document.getElementById('spinner-loading');
    var searchBtn = document.getElementById('search-btn');

    if (spinner.classList.contains('hidden')) {
        spinner.classList.remove('hidden');
        searchBtn.textContent = 'En recherche...';
    } else {
        spinner.classList.add('hidden');
        searchBtn.textContent = 'Rechercher un client';
    }
}
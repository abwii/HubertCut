// cutterScript.js

console.log('Hello cutterScript.js');

document.addEventListener('DOMContentLoaded', function() {
    var searchBtn = document.getElementById('search-btn');
    var spinner = document.getElementById('spinner-loading');
    
    if (cutterStatus === 'LFC') {
        searchBtn.textContent = 'En recherche...';
        spinner.classList.remove('hidden');
    } else {
        searchBtn.textContent = 'Rechercher un client';
        spinner.classList.add('hidden');
    }
});

function search() {
    console.log('search() called');

    var spinner = document.getElementById('spinner-loading');
    var searchBtn = document.getElementById('search-btn');

    updateCutterStatus(function(newStatus) {
        if (newStatus === 'LFC') {
            searchBtn.textContent = 'En recherche...';
            spinner.classList.remove('hidden');
        } else {
            searchBtn.textContent = 'Rechercher un client';
            spinner.classList.add('hidden');
        }
    });
}

function updateCutterStatus(callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/update-cutter-status', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Cutter status updated');
            var newStatus = xhr.responseText.split(' ').pop();
            callback(newStatus);
        }
    };
    xhr.send();
}

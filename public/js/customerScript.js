// This thing on?
console.log('Hello customerScript.js');

$(document).ready(function() {
    $('#RdvForm').submit(function(event) {
        console.log('Form submitted.');
        event.preventDefault();
        
        // Récupérer les valeurs des champs
        var message1 = $('#field_name1').val();
        var message2 = $('#field_name1').val();
        var message3 = $('#field_name1').val();

        // Créer une chaîne de caractères avec les valeurs des champs
        var formData = "field_name1: " + message1 + "<br>field_name1: " + message2 + "<br>field_name1: " + message3;

        // Afficher les données dans la div
        $('#result').html(formData);
    });
});
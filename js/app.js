// Ajoutez ceci dans votre fichier script.js

function showSuccessModal() {
    var modal = document.getElementById("success-modal");
    modal.style.display = "block";

    // Masque la fenêtre modale après 3 secondes
    setTimeout(function () {
        hideSuccessModal();
    }, 3000);
}

function hideSuccessModal() {
    var modal = document.getElementById("success-modal");
    modal.style.display = "none";
}

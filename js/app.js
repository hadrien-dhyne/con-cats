document.addEventListener('DOMContentLoaded', function () { 
    
    const form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    // debut de la fonction validateForm qui sert a verifier avant l'envoie en back que le formulaire est bien complété
    function validateForm() {
        let isValid = true;

        // on enlève les messages d'erreurs (cf fonction resetstyles)
        resetStyles();

        // on définit les messages d'erreur pour chaque ligne
        const fields = [
            { id: 'name', message: 'Please fill in your name' },
            { id: 'firstname', message: 'Please fill in your first name' },
            { id: 'birthdate', message: 'Please fill in your birthdate' },
            { id: 'email', message: 'Please fill in your email address' },
            { id: 'username', message: 'Please fill in your username' },
            { id: 'password', message: 'Please fill in your password' },
            { id: 'password_repeat', message: 'Repeat your password please' }
        ];

        // on vérifie les champs 
        fields.forEach(function (field) {
            const input = document.getElementById(field.id);
            // si un champ n'est pas bon on affiche le message d'erreur
            if (!input.value.trim()) {
                isValid = false;
                displayError(input, field.message);
            }
        });

        return isValid;
    }

    // fonction d'affichage du message d'erreur
    function displayError(element, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'alert alert-danger';
        errorDiv.textContent = message;

        element.classList.add('is-invalid');

        // on affiche le message apres le parent
        element.parentNode.appendChild(errorDiv);
    }

    // fonction de suppression des messages
    function resetStyles() {
        const errorMessages = form.querySelectorAll('.alert-danger');
        errorMessages.forEach(function (errorMessage) {
            errorMessage.remove();
        });

        const inputs = form.querySelectorAll('input');
        inputs.forEach(function (input) {
            input.classList.remove('is-invalid');
        });
    }
});

// on definit la variable generatedpassword sur faux de base
var generatedPassword = false;

// fonction pour générer un mot de passe
function generatePassword() {
    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_!@#$%^&*()";
    var password = "";
    for (var i = 0; i < 18; i++) {
        var randomIndex = Math.floor(Math.random() * charset.length);
        password += charset[randomIndex];
    }

    document.getElementById("password").value = password;
    document.getElementById("password").type = "text";
    document.getElementById("generatePasswordBtn").disabled = false;
    document.getElementById("password_repeat").value = password;
    document.getElementById("password_repeat").type = "text";
    generatedPassword = true;
}

// fonction pour montrer le mot de passe
function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    var repeatPasswordField = document.getElementById("password_repeat");
    var checkbox = document.getElementById("showPasswordCheckbox");

    passwordField.type = checkbox.checked || generatedPassword ? "text" : "password";
    repeatPasswordField.type = checkbox.checked && generatedPassword ? "text" : "password";
}

// fonction pour afficher le formulaire d'ajout de contact
function toggleForm() {
    var form = document.getElementById('contactForm');
    if (form.style.display === 'none') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // on définit a quoi correspond la variable pour afficher le message d'accueil
    var welcomeOverlay = document.querySelector(".welcome-overlay");

    // on montre le message ...
    welcomeOverlay.style.opacity = 1;

    // ... et on le cache apres 3 secondes :p
    setTimeout(function () {
        hideOverlay();
    }, 3000);

    // ou alors il disparait au clic
    welcomeOverlay.addEventListener("click", function () {
        hideOverlay();
    });

    // focntion qui masque le message de bienvenue
    function hideOverlay() {
        welcomeOverlay.style.opacity = 0;
        setTimeout(function () {
            welcomeOverlay.style.display = "none";
        }, 500);
    }
});

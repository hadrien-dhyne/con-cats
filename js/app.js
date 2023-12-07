console.log('hello')

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        let isValid = true;

        // Reset styles and remove previous error messages
        resetStyles();

        // Check each input field
        const fields = [
            { id: 'name', message: 'Please fill in your name' },
            { id: 'firstname', message: 'Please fill in your first name' },
            { id: 'birthdate', message: 'Please fill in your birthdate' },
            { id: 'email', message: 'Please fill in your email address' },
            { id: 'username', message: 'Please fill in your username' },
            { id: 'password', message: 'Please fill in your password' },
            { id: 'password_repeat', message: 'Repeat your password please' }
        ];

        fields.forEach(function (field) {
            const input = document.getElementById(field.id);

            if (!input.value.trim()) {
                isValid = false;
                displayError(input, field.message);
            }
        });

        return isValid;
    }

    function displayError(element, message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'alert alert-danger';
        errorDiv.textContent = message;

        // Add a red border to the input field
        element.classList.add('is-invalid');

        // Insert the error message after the input field
        element.parentNode.appendChild(errorDiv);
    }

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

var generatedPassword = false; // Variable pour suivre si le mot de passe a été généré automatiquement

function generatePassword() {
    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_!@#$%^&*()";
    var password = "";
    for (var i = 0; i < 18; i++) {
        var randomIndex = Math.floor(Math.random() * charset.length);
        password += charset[randomIndex];
    }
    

    document.getElementById("password").value = password;
    document.getElementById("password").type = "text"; // change le type du champ de mot de passe à texte
    document.getElementById("generatePasswordBtn").disabled = false; // réactive le bouton après la génération
    document.getElementById("password_repeat").value = password; // remplit automatiquement le champ de répétition du mot de passe
    document.getElementById("password_repeat").type = "text"; // rend visible le champ de répétition du mot de passe
    generatedPassword = true; // indique que le mot de passe a été généré automatiquement
}

function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    var repeatPasswordField = document.getElementById("password_repeat");
    var checkbox = document.getElementById("showPasswordCheckbox");
    
    passwordField.type = checkbox.checked || generatedPassword ? "text" : "password";
    repeatPasswordField.type = checkbox.checked && generatedPassword ? "text" : "password";
}
document.addEventListener('DOMContentLoaded', function() {
    const showFormBtn = document.getElementById('showFormBtn');
    const formContainer = document.getElementById('formContainer');
    const backgroundOverlay = document.getElementById('backgroundOverlay');

    showFormBtn.addEventListener('click', function() {
      formContainer.classList.toggle('d-none');
      backgroundOverlay.classList.toggle('overlay-active');
    });
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        document.getElementById('welcomeOverlay').classList.add('overlay-hidden');
    }, 3000);

    const showFormBtn = document.getElementById('showFormBtn');
    const formContainer = document.getElementById('formContainer');
    const backgroundOverlay = document.getElementById('backgroundOverlay');

    showFormBtn.addEventListener('click', function() {
        formContainer.classList.toggle('d-none');
        backgroundOverlay.classList.toggle('overlay-active');
    });
});
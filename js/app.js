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

         
        resetStyles();

         
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

         
        element.classList.add('is-invalid');

         
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

var generatedPassword = false;  

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

function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    var repeatPasswordField = document.getElementById("password_repeat");
    var checkbox = document.getElementById("showPasswordCheckbox");
    
    passwordField.type = checkbox.checked || generatedPassword ? "text" : "password";
    repeatPasswordField.type = checkbox.checked && generatedPassword ? "text" : "password";
}

function toggleForm() {
    var form = document.getElementById('contactForm');
    if (form.style.display === 'none') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    var welcomeOverlay = document.querySelector(".welcome-overlay");

     
    welcomeOverlay.style.opacity = 1;

     
    setTimeout(function() {
        hideOverlay();
    }, 3000);

     
    welcomeOverlay.addEventListener("click", function() {
        hideOverlay();
    });

     
    var contactForm = document.getElementById("contactForm");
    contactForm.addEventListener("submit", function(event) {
        event.preventDefault();
    });

    function hideOverlay() {
        welcomeOverlay.style.opacity = 0;
        setTimeout(function() {
            welcomeOverlay.style.display = "none";
        }, 500);  
    }
});
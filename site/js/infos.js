//Boutons informations mot de passe


const passwordInput = document.getElementById("password1");
const passwordStrengthText = document.getElementById("password-strength-text");
const passwordStrengthDiv = document.getElementById("password-strength");

passwordInput.addEventListener("input", updatePasswordStrength);

function updatePasswordStrength() {
    const password = passwordInput.value;
    const strength = calculatePasswordStrength(password);
    displayPasswordStrength(strength);
}

function calculatePasswordStrength(password) {
    let strength = 0;

    // Vérifier la longueur du mot de passe
    if (password.length >= 8) {
        strength += 1;
    }

    // Vérifier s'il y a au moins une majuscule
    if (/[A-Z]/.test(password)) {
        strength += 1;
    }

    // Vérifier s'il y a au moins une minuscule
    if (/[a-z]/.test(password)) {
        strength += 1;
    }

    // Vérifier s'il y a au moins un chiffre
    if (/\d/.test(password)) {
        strength += 1;
    }

    // Vérifier s'il y a au moins un caractère spécial
    if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        strength += 1;
    }

    return strength;
}

function displayPasswordStrength(strength) {
    passwordStrengthText.textContent = "";

    if (strength === 0) {
        passwordStrengthDiv.style.display = "none";
    } else {
        passwordStrengthDiv.style.display = "block";

        if (strength <= 2) {
            passwordStrengthText.textContent = "Sécurité mot de passe : Faible";
            passwordStrengthText.classList.add("weak");
            passwordStrengthText.classList.remove("medium");
            passwordStrengthText.classList.remove("strong");
        } else if (strength <= 4) {
            passwordStrengthText.textContent = "Sécurité mot de passe : Moyen";
            passwordStrengthText.classList.remove("weak");
            passwordStrengthText.classList.add("medium");
            passwordStrengthText.classList.remove("strong");
        } else {
            passwordStrengthText.textContent = "Sécurité mot de passe : Fort";
            passwordStrengthText.classList.remove("weak");
            passwordStrengthText.classList.remove("medium");
            passwordStrengthText.classList.add("strong");
        }
    }
}


//Bouton information e-mail

const emailInput = document.getElementById("email");

emailInput.addEventListener("input", validateEmailFormat);

function validateEmailFormat() {
    const email = emailInput.value;
    const isValidFormat = validateEmailRegex(email);

    if (isValidFormat) {
        emailInput.setCustomValidity("");
    } else {
        emailInput.setCustomValidity("Veuillez saisir un e-mail valide (exemple@exemple.com).");
    }
}

function validateEmailRegex(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
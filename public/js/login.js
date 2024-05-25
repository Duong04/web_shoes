const email = document.getElementById('email');
const password = document.getElementById('psw');

function validateEmail() {
    var emailError = document.getElementById("email-error");
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value === "") {
        emailError.textContent = "Please enter an email address";
        email.style.borderColor = 'red';
        return false;
    } else if (!regex.test(email.value)) {
        emailError.textContent = "Please enter a valid email address";
        email.style.borderColor = 'red';
        return false;
    } else {
        emailError.textContent = ""; 
        email.style.borderColor = "var(--grey-color)";
        return true;
    }
}

function validatePassword() {
    var passwordError = document.getElementById("psw-error");
    if (password.value === "") {
        passwordError.textContent = "Please enter a password";
        password.style.borderColor = 'red';
        return false;
    } else if (password.value.length < 7) {
        passwordError.textContent = "Password must be longer than 6 characters";
        password.style.borderColor = 'red';
        return false;
    } else {
        passwordError.textContent = ""; 
        password.style.borderColor = "var(--grey-color)";
        return true;
    }
}

function validateForm() {
    var isValid = true;

    // Validate email
    var emailValid = validateEmail();

    // Validate password
    var passwordValid = validatePassword();

    isValid = emailValid && passwordValid;
    if (isValid) {
        return true;
    } else {
        return false;
    }
}

document.getElementById("contactForm").addEventListener('submit', function(event) {
    var isValid = validateForm();
    if (!isValid) {
        event.preventDefault();
    }
});

// Validate on blur
document.getElementById("email").addEventListener('blur', validateEmail);
document.getElementById("psw").addEventListener('blur', validatePassword);

// Clear error messages on input
email.addEventListener('input', function () {
    document.getElementById("email-error").textContent = "";
    email.style.borderColor = '#ccc';
});
password.addEventListener('input', function () {
    document.getElementById("psw-error").textContent = "";
    password.style.borderColor = '#ccc';
});
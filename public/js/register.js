const userName = document.getElementById('userName');
const email = document.getElementById('email');
const password = document.getElementById('psw');
const confirmPassword = document.getElementById('confirmPsw');

function validateUserName() {
    const nameError = document.getElementById('name-error');
    if (userName.value == "") {
        nameError.textContent = "Username cannot be empty";
        userName.style.borderColor = 'red';
        return false;
    } else {
        nameError.textContent = "";
        userName.style.borderColor = '#ccc';
        return true;
    }
}

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
        email.style.borderColor = "#ccc";
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
        password.style.borderColor = "#ccc";
        return true;
    }
}

function validateConfirmPassword() {
    var confirmPasswordError = document.getElementById("confirm-psw-error");
    if (confirmPassword.value === "") {
        confirmPasswordError.textContent = "Please confirm your password";
        confirmPassword.style.borderColor = 'red';
        return false;
    } else if (password.value !== confirmPassword.value) {
        confirmPasswordError.textContent = "Passwords do not match";
        confirmPassword.style.borderColor = 'red';
        return false;
    } else {
        confirmPasswordError.textContent = ""; 
        confirmPassword.style.borderColor = "#ccc";
        return true;
    }
}

function validateForm() {
    var isValid = true;

    // Validate username
    var userNameValid = validateUserName();

    // Validate email
    var emailValid = validateEmail();

    // Validate password
    var passwordValid = validatePassword();

    // Validate confirm password
    var confirmPasswordValid = validateConfirmPassword();

    isValid = userNameValid && emailValid && passwordValid && confirmPasswordValid;
    return isValid;
}

document.getElementById("contactForm").addEventListener('submit', function(event) {
    var isValid = validateForm();
    if (!isValid) {
        event.preventDefault();
    }
});

// Validate on blur
document.getElementById("userName").addEventListener('blur', validateUserName);
document.getElementById("email").addEventListener('blur', validateEmail);
document.getElementById("psw").addEventListener('blur', validatePassword);
document.getElementById("confirmPsw").addEventListener('blur', validateConfirmPassword);

// Clear error messages on input
userName.addEventListener('input', function () {
    document.getElementById("name-error").textContent = "";
    userName.style.borderColor = '#ccc';
});
email.addEventListener('input', function () {
    document.getElementById("email-error").textContent = "";
    email.style.borderColor = '#ccc';
});
password.addEventListener('input', function () {
    document.getElementById("psw-error").textContent = "";
    password.style.borderColor = '#ccc';
});
confirmPassword.addEventListener('input', function () {
    document.getElementById("confirm-psw-error").textContent = "";
    confirmPassword.style.borderColor = '#ccc';
});
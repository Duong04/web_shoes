const userName = document.getElementById('userName');
const email = document.getElementById('email');
const password = document.getElementById('psw');
const confirmPassword = document.getElementById('confirmPsw');

function validateUserName() {
    const nameError = document.getElementById('name-error');
    if (userName.value == "") {
        nameError.textContent = "Tên người dùng không được để trống";
        userName.style.borderColor = 'red';
        return false;
    } else {
        nameError.textContent = "";
        userName.style.borderColor = 'var(--grey-color)';
        return true;
    }
}

function validateEmail() {
    var emailError = document.getElementById("email-error");
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.value === "") {
        emailError.textContent = "Vui lòng nhập địa chỉ email";
        email.style.borderColor = 'red';
        return false;
    } else if (!regex.test(email.value)) {
        emailError.textContent = "Vui lòng nhập đúng định dạng email";
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
        passwordError.textContent = "Vui lòng nhập mật khẩu";
        password.style.borderColor = 'red';
        return false;
    }else if(password.value.length < 7){
        passwordError.textContent = "Vui lòng nhập độ dài hơn 6 ";
        password.style.borderColor = 'red';
        return false;
    }
     else {
        passwordError.textContent = ""; 
        password.style.borderColor = "var(--grey-color)";
        return true;
    }
}

function validateConfirmPassword() {
    var confirmPasswordError = document.getElementById("confirm-psw-error");
    if (confirmPassword.value === "") {
        confirmPasswordError.textContent = "Vui lòng nhập lại mật khẩu";
        confirmPassword.style.borderColor = 'red';
        return false;
    } else if (password.value !== confirmPassword.value) {
        confirmPasswordError.textContent = "Mật khẩu không khớp";
        confirmPassword.style.borderColor = 'red';
        return false;
    } else {
        confirmPasswordError.textContent = ""; 
        confirmPassword.style.borderColor = "var(--grey-color)";
        return true;
    }
}

function validateForm() {
    var isValid = true;

    // Kiểm tra hợp lệ của tên người dùng
    var userNameValid = validateUserName();

    // Kiểm tra hợp lệ của email
    var emailValid = validateEmail();


    // Kiểm tra hợp lệ của mật khẩu
    var passwordValid = validatePassword();


    // Kiểm tra hợp lệ của việc nhập lại mật khẩu
    var confirmPasswordValid = validateConfirmPassword();

    isValid = userNameValid && emailValid && passwordValid && confirmPasswordValid;
    if (isValid) {
        return true;
    }else {
        return false;
    }

}

document.getElementById("contactForm").addEventListener('submit', function(event) {
    var isValid = validateForm();
    if (!isValid) {
        event.preventDefault();
    }
});

// kiểm tra hợp lệ khi người dùng rời khỏi trường nhập liệu
document.getElementById("userName").addEventListener('blur', validateUserName);
document.getElementById("email").addEventListener('blur', validateEmail);
document.getElementById("psw").addEventListener('blur', validatePassword);
document.getElementById("confirmPsw").addEventListener('blur', validateConfirmPassword);

// xóa thông báo lỗi khi người dùng thay đổi nội dung
userName.addEventListener('input', function () {
    document.getElementById("user-name-error").textContent = "";
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

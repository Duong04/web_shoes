const password =document.querySelector('#psw');
        const confirmPassword =document.querySelector('#confirmPsw');

        function validatePassword() {
            var passwordError = document.getElementById("psw-error");
            if (password.value === "") {
                passwordError.textContent = "Please enter a password";
                password.style.borderColor = 'red';
                return false;
            }else if(password.value.length < 7){
                passwordError.textContent = "Please enter a length of more than 6";
                password.style.borderColor = 'red';
                return false;
            }
            else {
                passwordError.textContent = ""; 
                password.style.borderColor = "#ccc";
                return true;
            }
        }

        function validateConfirmPassword() {
            var confirmPasswordError = document.getElementById("confirm-psw-error");
            if (confirmPassword.value === "") {
                confirmPasswordError.textContent = "Please enter a password";
                confirmPassword.style.borderColor = 'red';
                return false;
            } else if (password.value !== confirmPassword.value) {
                confirmPasswordError.textContent = "password incorrect";
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


            // Kiểm tra hợp lệ của mật khẩu
            var passwordValid = validatePassword();


            // Kiểm tra hợp lệ của việc nhập lại mật khẩu
            var confirmPasswordValid = validateConfirmPassword();

            isValid = passwordValid && confirmPasswordValid;
            if (isValid) {
                return true;
            }else {
                return false;
            }

        }

        document.getElementById("registration-form").addEventListener('submit', function(event) {
            var isValid = validateForm();
            if (!isValid) {
                event.preventDefault();
            }
        });

        // kiểm tra hợp lệ khi người dùng rời khỏi trường nhập liệu
        document.getElementById("psw").addEventListener('blur', validatePassword);
        document.getElementById("confirmPsw").addEventListener('blur', validateConfirmPassword);

        password.addEventListener('input', function () {
            document.getElementById("psw-error").textContent = "";
            password.style.borderColor = '#ccc';
        });

        confirmPassword.addEventListener('input', function () {
            document.getElementById("confirm-psw-error").textContent = "";
            confirmPassword.style.borderColor = '#ccc';
        });
<?php
class Users extends Database {
    function selectUsers() {
        $sql = "SELECT * FROM users INNER JOIN roles ON users.role_id = roles.role_id";
        return $this->selectAll($sql);
    }

    function inserUsers($userName, $email, $password, $token) {
        $sql = "INSERT INTO users (user_name, email, password, token, role_id, created_at, updated_at, avatar) 
                values(?, ?, ?, ?, 3, NOW(), NOW(), 'public/img/users/default-image.png')";
        return $this->cud($sql, [$userName, $email, $password, $token]);
    }

    function selectEmail($email) {
        $sql = "SELECT * FROM users INNER JOIN roles ON users.role_id = roles.role_id WHERE users.email = ?";
        return $this->selectOne($sql, [$email]);
    }

    function selectToken($token) {
        $sql = "SELECT * FROM users WHERE token = ?";
        return $this->selectOne($sql, [$token]);
    }

    function updateStatusWithToken($token) {
        $sql = "UPDATE users SET status = 'active', token = 0 WHERE token = ?";
        return $this->cud($sql, [$token]);
    }

    function updateOtpWithEmail($otp, $email) {
        $sql = "UPDATE users SET otp = ? WHERE email = ?";
        return $this->cud($sql, [$otp, $email]);
    }

    function selectOtp($otp) {
        $sql = "SELECT * FROM users WHERE otp = ?";
        return $this->selectOne($sql, [$otp]);
    }

    function updatePasswordWithEmail($password, $email) {
        $sql = "UPDATE users SET password = ?, otp = 0 WHERE email = ?";
        return $this->cud($sql, [$password, $email]);
    }
}

?>
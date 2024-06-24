<?php
class Users extends Database {
    public function selectUsers() {
        $sql = "SELECT * FROM users INNER JOIN roles ON users.role_id = roles.role_id";
        return $this->selectAll($sql);
    }

    public function inserUsers($userName, $email, $password, $token) {
        $sql = "INSERT INTO users (user_name, email, password, token, role_id, created_at, updated_at, avatar) 
                values(?, ?, ?, ?, 3, NOW(), NOW(), 'public/img/users/default-image.png')";
        return $this->cud($sql, [$userName, $email, $password, $token]);
    }

    public function inserUsers_2($userName, $email, $password, $roleId, $status) {
        $sql = "INSERT INTO users (user_name, email, password, role_id, status, created_at, updated_at, avatar) 
                VALUES(?, ?, ?, ?, ?, NOW(), NOW(), 'public/img/users/default-image.png')";
        return $this->cud($sql, [$userName, $email, $password, $roleId, $status]);
    }

    public function selectEmail($email) {
        $sql = "SELECT * FROM users INNER JOIN roles ON users.role_id = roles.role_id WHERE users.email = ?";
        return $this->selectOne($sql, [$email]);
    }

    public function selectToken($token) {
        $sql = "SELECT * FROM users WHERE token = ?";
        return $this->selectOne($sql, [$token]);
    }

    public function selectId($userId) {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        return $this->selectOne($sql, [$userId]);
    }

    public function updateStatusWithToken($token) {
        $sql = "UPDATE users SET status = 'active', token = 0 WHERE token = ?";
        return $this->cud($sql, [$token]);
    }

    public function updateOtpWithEmail($otp, $email) {
        $sql = "UPDATE users SET otp = ? WHERE email = ?";
        return $this->cud($sql, [$otp, $email]);
    }

    public function selectOtp($otp) {
        $sql = "SELECT * FROM users WHERE otp = ?";
        return $this->selectOne($sql, [$otp]);
    }

    public function updatePasswordWithEmail($password, $email) {
        $sql = "UPDATE users SET password = ?, otp = 0 WHERE email = ?";
        return $this->cud($sql, [$password, $email]);
    }
    
    public function selectRoles() {
        $sql = "SELECT * FROM roles";
        return $this->selectAll($sql);
    }

    public function insertRole($roleName) {
        $sql = "INSERT INTO roles (role_name, created_at, updated_at) 
                VALUES (?, NOW(), NOW())";
        return $this->cud($sql, [$roleName]);
    }

    public function selectRoleById($roleId) {
        $sql = "SELECT * FROM roles WHERE role_id = ?";
        return $this->selectOne($sql, [$roleId]);
    }

    public function selectNameRole($roleName) {
        $sql = "SELECT * FROM roles WHERE role_name = ?";
        return $this->selectOne($sql, [$roleName]);
    }

    public function checkName($roleName, $roleId) {
        $sql = "SELECT * FROM roles WHERE role_name = ? AND role_id != ?";
        return $this->selectOne($sql, [$roleName, $roleId]);
    }

    public function updateRole($roleName, $roleId) {
        $sql = "UPDATE roles SET role_name = ?, updated_at = NOW() WHERE role_id = ?";
        return $this->cud($sql, [$roleName, $roleId]);
    }

    public function updateStatus($id, $status) {
        $sql = "UPDATE users SET status = ? WHERE user_id = ?";
        return $this->cud($sql, [$status, $id]);
    }

    public function updateRoleUser($userId, $roleId) {
        $sql = "UPDATE users SET role_id = ? WHERE user_id = ?";
        return $this->cud($sql, [$roleId, $userId]);
    }

    public function checkEmail($email, $userId) {
        $sql = "SELECT * FROM users WHERE email = ? AND user_id != ?";
        return $this->selectOne($sql, [$email, $userId]);
    }

    public function updateProfile($email, $userName, $phone, $address, $avatar, $userId) {
        if ($avatar == null) {
            $sql = "UPDATE users SET email = ?, user_name = ?, phone = ?, address = ? WHERE user_id = ?";
            return $this->cud($sql, [$email, $userName, $phone, $address, $userId]);
        }else {
            $sql = "UPDATE users SET email = ?, user_name = ?, phone = ?, address = ?, avatar = ? WHERE user_id = ?";
            return $this->cud($sql, [$email, $userName, $phone, $address, $avatar, $userId]);
        }
    }
}

?>
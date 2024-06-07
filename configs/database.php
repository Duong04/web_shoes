<?php 
    class Database {
        private $serverName = 'mysql:host=localhost;dbname=web_shoes;charset=utf8';
        private $userName = 'root';
        private $password = '';
        private $connection;

        function __construct() {
            try {
                $this->connection = new PDO($this->serverName, $this->userName, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connectionion failed: " . $e->getMessage();
            }
        }

        protected function getConnection() {
            return $this->connection;
        }

        function selectAll($sql) {
            try {
                $conn = $this->getConnection();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt->execute();
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        function selectAllWithId($sql, $value) {
            try {
                $conn = $this->getConnection();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt->execute($value);
    
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    

        function selectOne($sql, $value) {
            try {
                $conn = $this->getConnection();
                $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt -> execute($value);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                return $result;
            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        function cud($sql, $value) {
            try {
                $conn = $this->getConnection();
                $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt -> execute($value);

                return true;
            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        function insertGetId($sql, $value) {
            try {
                $conn = $this->getConnection();
                $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt -> execute($value);
                $lastInsertId = $conn->lastInsertId();

                return $lastInsertId;
            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        function selectStatistical($sql) {
            try {
                $conn = $this->getConnection();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt->execute();
    
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        function __destruct() {
            $this->connection = null;
        }
    }
?>
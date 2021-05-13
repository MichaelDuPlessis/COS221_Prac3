<?php
    class Database {
        private $conn = null;

        public static function instance() {
            static $instance = null;
            if ($instance === null)
                $instance = new Database();
            return $instance;
        }

        private function __construct() {
            $conn = new mysqli("", "", "");
            if($conn === false)
                die("Error: Failed to connect " . $conn->connect_error);
            $conn->select_db("");
        }

        public function __destruct() {

        }

        public function findUser($id) {
            $sql = "Select id_no from person where id_no=$id";
            if($conn->query($sql) === true)
                echo "New record created successfully";
            else
                echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // returns a boolean whether the password matches the stored password
        public function validateUserPass($id, $pass) {
            $sql = "SELECT * FROM PERSON WHERE id_no = $id AND password = $pass";
            if($conn->query($sql) === true)
                echo "Password and id checked against parametres";
            else
                echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
<?php
    include_once "config.php";

    class Database {
        // refers to database connection
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

        // returns the result
        public function findUser($id) {
            $sql = "Select * from person where id_no=$id";
            $result = $conn->query($sql);

            return $result;
        }

        // returns a bool
        public function checkUserExists($id) {
            $sql = "Select id_no from person where id_no=$id";
            $result = $conn->query($sql);

            return ($result->num_rows > 0);
        }
    }
?>
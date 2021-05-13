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
    }
?>
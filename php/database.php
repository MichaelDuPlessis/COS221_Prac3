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

        public function __construct() {
            $DBusername = "u20430168";
            $DBpassword = "RHBBQV2AGCFKHVN4DCEMTXNMSE7YCQWE";
            $DBhost = "wheatley.cs.up.ac.za";
            $DBname = "u20430168_election_system";

            $this->conn = new mysqli($DBhost, $DBusername, $DBpassword, $DBname);
            if($this->conn === false)
                die("Error: Failed to connect " . $this->conn->connect_error);
            $this->conn->select_db("");
        }

        public function __destruct() {
            $this->conn->close();
        }

        // returns true if user is found
        public function findId($id) {
            $sql = "Select id_no from person where id_no=$id";
            $result = $this->conn->query($sql);

            return $result->num_rows > 0;
        }

        // returns true if email is found
        public function checkEmailExists($email) {
            $sql = "Select id_no from person where email=$email";
            $result = $this->conn->query($sql);

            return $result->num_rows > 0;
        }

        // returns a boolean whether the password matches the stored password
        public function validateUserPass($id, $pass) {
            $sql = "SELECT * FROM PERSON WHERE id_no = $id AND password = $pass";
            if($this->conn->query($sql) === true)
                echo "Password and id checked against parametres";
            else
                echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        // returns the result
        // public function findUser($id) {
        //     $sql = "Select * from person where id_no=$id";
        //     $result = $this->conn->query($sql);

        //     return $result;
        // }

        public function addUser($id, $name, $mname, $surname, $cell, $email, $addr, $pass, $ward_id) {
            $stmt = $this->conn->prepare("insert into person values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $voted = 0;
            settype($ward_id, "integer");
            $stmt->bind_param("ssssssssii", $id, $name, $mname, $surname, $cell, $email, $addr, $pass, $voted, $ward_id);
            if ($stmt->execute())
                echo 'success';
            else
                die("Error: " . $this->conn->mysqli->error);
        }

        public function checkWardExists($ward) {
            $sql = "Select ward_id from ward where ward_id=$ward";
            $result = $this->conn->query($sql);

            return $result->num_rows > 0;
        }

        public function checkCellExists($cell) {
            $sql = "Select id from person where cell=$cell";
            $result = $this->conn->query($sql);

            return $result->num_rows > 0;
        }
    }
?>
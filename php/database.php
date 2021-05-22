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
        public function findEmail($email) {
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

        public function addUser($id, $name, $mname, $surname, $cell, $email, $pass, $ward_id) {
            $stmt = $this->conn->prepare("insert into person values (?, ?, ?, ?, ?, ? ,?, ?)");
            $stmt->bind_param("ssssssssii", $id, $name, $mname, $surname, $cell, $email, $add, $pass, $ward_id, 0);
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
    }
?>
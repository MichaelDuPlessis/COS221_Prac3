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
            $DBusername = "u20430168";
            $DBpassword = "RHBBQV2AGCFKHVN4DCEMTXNMSE7YCQWE";
            $DBhost = "wheatley.cs.up.ac.za";
            $DBname = "u20430168_election_system";

            $this->conn = new mysqli($DBhost, $DBusername, $DBpassword, $DBname);
            if($this->conn === false)
                die("Error: Failed to connect " . $this->conn->connect_error);
              
         
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

        // returns a bool
        public function checkUserExists($id) {
            $sql = "Select id_no from person where id_no=$id";
            $result = $this->conn->query($sql);

            return ($result->num_rows > 0);
        }

        // its in the name, also returns a bool
        public function checkUserinIEC($id) {
            $sql = "SELECT id_no FROM ELECTORAL_STAFF WHERE id_no=$id";
            $result = $this->conn->query($sql);

            return ($result->num_rows > 0);
        }

        //its in the name
        public function checkUserVoted($id) {
            $sql = "SELECT voted FROM PERSON WHERE id_no=$id";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row["voted"] == true)
                return true;
            return false;
        }              
    
        //its in the name
        public function addUser($id, $name, $mname, $surname, $email, $cell, $pass) {
            $stmt = $this->conn->prepare("insert into person values (?, ?, ?, ?, ?, ? ,?)");
            $stmt->bind_param("sssssss", $id, $name, $mname, $surname, $email, $cell, $pass);
            $stmt->execute();
        }    
        
        public function getUserWardID($id) {
            $sql = "SELECT ward_ID FROM PERSON WHERE id_no=$id";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();            
            $wardID = $row["ward_ID"];

            return $wardID;

        }

        public function getUserName($id) {
            $sql = "SELECT f_name, l_name FROM PERSON WHERE id_no=$id";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();            
            $name = $row["f_name"] ." ". $row["l_name"];

            return $name;

        }
    }
?>
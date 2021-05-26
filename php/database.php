<?php

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
            $stmt = $this->conn->prepare("Select id_no from person where id_no=?");
            $stmt->bind_param("s", $id);
            $stmt->execute();

            $stmt->bind_result($data);
            $stmt->fetch();

            return $stmt->num_rows() > 0;
        }

        // returns true if email is found
        public function checkEmailExists($email) {
            $stmt = $this->conn->prepare("Select id_no from person where email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $stmt->bind_result($data);
            $stmt->fetch();

            return $stmt->num_rows() > 0;
        }

        // returns a bool
        public function checkUserExists($id) {
            $stmt = $this->conn->prepare("Select id_no from person where id_no=?");
            $stmt->bind_param("s", $id);
            $stmt->execute();

            $stmt->bind_result($data);
            $stmt->fetch();

            return $stmt->num_rows() > 0;
        }

        
        public function addUser($id, $name, $mname, $surname, $cell, $email, $addr, $pass, $ward_id) {
            $stmt = $this->conn->prepare("insert into person values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $voted = 0;
            settype($ward_id, "integer");
            $stmt->bind_param("ssssssssii", $id, $name, $mname, $surname, $cell, $email, $addr, $pass, $ward_id, $voted);
            if ($stmt->execute())
            echo 'success';
            else
            die("Error: " . $this->conn->error);
            $stmt->close();
            
        }
        
        public function checkWardExists($ward) {
            $stmt = $this->conn->prepare("Select ward_id from ward where ward_id=?");
            $stmt->bind_param("s", $ward);
            $stmt->execute();

            $stmt->bind_result($data);
            $stmt->fetch();

            return $stmt->num_rows() > 0;
        }
        
        public function checkCellExists($cell) {
            $sql = "Select id from person where cell=$cell";
            $stmt = $this->conn->prepare("Select id from person where cell=?");
            $stmt->bind_param("s", $cell);
            $stmt->execute();

            $stmt->bind_result($data);
            $stmt->fetch();

            return $stmt->num_rows() > 0;
        }
        
        // its in the name, also returns a bool
        public function checkUserinIEC($id) {
            $sql = $this->conn->prepare("SELECT id_no FROM electoral_staff WHERE id_no=?");
            if ($sql===false) 
                die($this->conn->error);
            
            $sql->bind_param("s", $id);
            if (!$sql->execute())
                die("Error: Failed to connect to database");

            return ($sql->num_rows > 0);

        }

        //its in the name
        public function checkUserVoted($id) {
            $sql = $this->conn->prepare("SELECT voted FROM person WHERE id_no=?");
            if ($sql===false) 
                die($this->conn->error);
            $sql->bind_param("s", $id);
            if (!$sql->execute())
                die("Error: Failed to connect to database");

            return ($sql->num_rows > 0);
            
        }              
        
        public function getUserWardID($id) {
            $sql = $this->conn->prepare("SELECT ward_id FROM person WHERE id_no=?");
            $sql->bind_param('s',$id);
            if (!$sql->execute())
                die('Error: Failed to connect to database');
            
            $sql->bind_result($wardID);
            $sql->close();
                    
            return $wardID;

        }

        public function getUserName($id) {
            $sql = $this->conn->prepare("SELECT f_name, l_name FROM person WHERE id_no=?");
            $sql->bind_param('s',$id);
            if (!$sql->execute())
                die('Error: Failed to connect to database');
            
            $sql->bind_result($fname,$lname);
            $name = $fname .' '. $lname;
            $sql->close();
            
            return $name;
        }

        public function getUserPass($id) {
            $sql = $this->conn->prepare("SELECT password FROM person WHERE id_no=?");
            if ($sql===false) {
                die($this->conn->error);
            }
            $sql->bind_param('s',$id);
            if (!$sql->execute())
            die('Error: Failed to connect to database');
            
            $sql->bind_result($password);
            if (!$sql->fetch())
                die("Error: Failed to connect to database");
                        
            return $password;
        }

        public function updateUserAddress($id,$newAddress) {
            $sql = $this->conn->prepare("UPDATE person SET address = ? WHERE id_no = ?");
            $sql->bind_param('ss',$newAddress,$id);
            if (!$sql->execute()) {
                die("Error updating user address!!");
            } 
        
            $sql->close();

        }

        public function getUserDetailsAll($id) {
            $sql = $this->conn->prepare("select f_name, m_name, l_name, cell, email, address  from person where id_no = ?");
            if ($sql===false) {
                die($this->conn->error);
            }
            $sql->bind_param("s", $id);
            if (!$sql->execute())
                die("Error: Failed to connect to database");

            $sql->bind_result($fname, $mname, $lname, $cell, $email, $address);
            if (!$sql->fetch())
                die("Error: Failed to connect to database");

            return array("f_name" => $fname, "m_name" => $mname, "l_name" => $lname, "cell" => $cell, "email" => $email, "address" => $address);
        }
    }
?>
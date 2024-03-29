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

            return ($data === $id);
        }

        // returns true if email is found
        public function checkEmailExists($email) {
            $stmt = $this->conn->prepare("Select email from person where email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $stmt->bind_result($data);
            $stmt->fetch();
            // die($data);
            return ($data === $email);
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

        public function checkCellExists($cell) {
            $stmt = $this->conn->prepare("Select cell from person where cell=?");
            $stmt->bind_param("s", $cell);
            $stmt->execute();

            $stmt->bind_result($data);
            $stmt->fetch();

            return ($data === $cell);
        }
        
        public function addUser($id, $name, $mname, $surname, $cell, $email, $addr, $pass, $ward_id) {
            $stmt = $this->conn->prepare("insert into person values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");
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

            return ($data == $ward);
        }
        
        // its in the name, also returns a bool
        public function checkUserinIEC($id) {
            $sql = $this->conn->prepare("SELECT id_no FROM electoral_staff WHERE id_no=?");
            if ($sql===false) 
                die($this->conn->error);
            
            $sql->bind_param("s", $id);
            if (!$sql->execute())
                die("Error: Failed to connect to database");

            $sql->bind_result($data);
            $sql->fetch();

            return ($data == $id);
        }

        //its in the name
        public function checkUserVoted($id) {
            $sql = $this->conn->prepare("SELECT voted_flag FROM person WHERE id_no=?");
            if ($sql===false) 
                die($this->conn->error);
            $sql->bind_param("s", $id);
            if (!$sql->execute())
                die("Error: Failed to connect to database");

            $sql->bind_result($data);
            $sql->fetch();

            return ($data == 1);
        }              
        
        public function getUserWardID($id) {
            $sql = $this->conn->prepare("SELECT ward_id FROM person WHERE id_no=?");
            $sql->bind_param('s',$id);
            if (!$sql->execute())
                die('Error: Failed to connect to database');
            
            $sql->bind_result($wardID);;
            $sql->fetch();
                    
            return $wardID;
        }

        public function getUserName($id) {
            $sql = $this->conn->prepare("SELECT f_name, l_name FROM person WHERE id_no=?");
            $sql->bind_param('s',$id);
            if (!$sql->execute())
                die('Error: Failed to connect to database');
            
            $sql->bind_result($fname,$lname);
            $name = $fname .' '. $lname;
            $sql->fetch();
            
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

        public function getCandidates($wardID) {
            $stmt = $this->conn->prepare("Select candidate.id_no, f_name, l_name from person inner join candidate on person.id_no = candidate.id_no where candidate.ward_id = ?");
            $stmt->bind_param("i", $wardID);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
            $stmt->bind_result($id, $fname, $lname);

            $candidates = array();
            $i = 0;
            while ($stmt->fetch()) {
                $candidates[$i] = array("id" => $id, "fname" => $fname, "lname" => $lname);
                $i++;
            }

            return $candidates;
        }

        public function getParties($wardID, $type) {
            $sql = "";
            if ($type === 'l')
                $sql = "Select has.p_id, p_name, abbr from political_party inner join has on political_party.p_id = has.p_id where has.ward_id = ? and is_Dist <> 0";
            else if ($type === 'd')
            $sql = "Select has.p_id, p_name, abbr from political_party inner join has on political_party.p_id = has.p_id where has.ward_id = ? and is_Dist = 0";
            else if ($type === 'a')
                $sql = "Select has.p_id, p_name, abbr from political_party inner join has on political_party.p_id = has.p_id where has.ward_id = ?";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $wardID);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
            $stmt->bind_result($p_id, $name, $abb);

            $parties = array();
            $i = 0;
            while ($stmt->fetch()) {
                $parties[$i] = array("pID" => $p_id, "name" => $name, "abb" => $abb);
                $i++;
            }

            return $parties;
        }

        public function isLocal($wardID) {
            $stmt = $this->conn->prepare("Select dist_id from municipality inner join ward on ward.mun_id = municipality.mun_id where ward_id = ?");
            $stmt->bind_param("i", $wardID);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
            $stmt->bind_result($distID);
            $stmt->fetch();
            return $distID != 0;
        }

        public function addPartyVote($pID, $wardID) {
            $stmt = $this->conn->prepare("update has set votes=votes+1 where p_id=? and ward_id=?");
            $stmt->bind_param("ii", $pID, $wardID);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
        }

        public function addCanVote($canID, $wardID) {
            $stmt = $this->conn->prepare("update candidate set votes=votes+1 where id_no=? and ward_id=?");
            $stmt->bind_param("ii", $canID, $wardID);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
        }

        public function setVoted($id) {
            $stmt = $this->conn->prepare("update person set voted_flag=true where id_no=?");
            $stmt->bind_param("s", $id);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
        }

        public function setVerified($id) {
            $stmt = $this->conn->prepare("update person set verified_IEC=true where id_no=?");
            $stmt->bind_param("s", $id);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
        }

        public function checkVerified($id) {
            $sql = $this->conn->prepare("SELECT verified_IEC FROM person WHERE id_no=?");
            if ($sql===false) {
                die($this->conn->error);
            }
            $sql->bind_param('s',$id);
            if (!$sql->execute())
                die('Error: Failed to connect to database');
            
            $sql->bind_result($ver);
            if (!$sql->fetch())
                die("Error: Failed to connect to database");
                        
            return ($ver==1);
        }

        public function getUnverified() {
            $stmt = $this->conn->prepare("Select id_no, f_name, m_name, l_name, cell, email, address from person where verified_IEC = 0");
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
            $stmt->bind_result($id, $fname, $mname, $lname, $cell, $email, $addr);

            $people = array();
            $i = 0;
            while ($stmt->fetch()) {
                $people[$i] = array(
                    "id" => $id,
                    "fname" => $fname,
                    "mname" => $mname,
                    "lname" => $lname,
                    "cell" => $cell,
                    "email" => $email,
                    "addr" => $addr
                );
                $i++;
            }

            return $people;
        }

        public function addParty($name, $abb) {
            $stmt = $this->conn->prepare("insert into political_party(p_name, abbr) value(?,?)");
            $stmt->bind_param("ss", $name, $abb);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
        }

        public function checkPartyExists($pid) {
            $stmt = $this->conn->prepare("Select p_id from political_party where p_id=?");
            $stmt->bind_param("i", $pid);
            $stmt->execute();

            $stmt->bind_result($data);
            $stmt->fetch();

            return ($data == $pid);
        }

        public function addCandidate($id, $ward, $pid, $post) {
            $stmt = $this->conn->prepare("insert into candidate values(?,?,?,0,?)");
            $stmt->bind_param("siis", $id, $ward, $pid, $post);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
        }

        public function isCandidate($id) {
            $stmt = $this->conn->prepare("Select id_no from candidate where id_no=?");
            $stmt->bind_param("s", $id);
            $stmt->execute();

            $stmt->bind_result($data);
            $stmt->fetch();

            return ($data === $id);
        }

        public function addIEC($id) {
            $stmt = $this->conn->prepare("insert into electoral_staff values(?)");
            $stmt->bind_param("s", $id);
            if (!$stmt->execute())
                die("Error: Failed to connect to database");
        }
    }
?>
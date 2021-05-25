<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        for ($i = 0; $i < count($people); $i++) {
            if ($_POST["approve" . $i] == $i) {
                $db->setVerified($people[$i]["id"]);
                header("Refresh:0");
            }
        }
    }
?>
<?php
    include_once "./php/database.php";
    include_once "./php/password.php";

    function errorMsg($msg) {
        echo "<script> alert('$msg'); </script>"; 
    }
    
    if($_SERVER["REQUEST_METHOD"] === "POST") //process form data
    {
        $id = $_POST["id"];
        $post = $_POST["post"];
        $ward = $_POST["ward_id"];
        $pid = $_POST["party"];

        $good = true;

        $db = Database::instance();

        // id
        if ($db->findId($id) == 0) {
            errorMsg("ID not found");
            $good = false;
        }

        if ($db->isCandidate($id) == 0) {
            errorMsg("Person already a candidate");
            $good = false;
        }

        if (strlen($id) !== 0 && strlen($id) !== 13) {
            errorMsg("Invalid ID");
            $good = false;
        }

        // // ward
        if (!$db->checkWardExists($ward)) {
            errorMsg("No such ward exists");
            $good = false;
        }

        // // party id
        if (!$db->checkPartyExists($pid)) {
            errorMsg("No such party exists");
            $good = false;
        }

        if (strlen($post) == 0) {
            errorMsg("A post must be entered");
            $good = false;
        }
        
        // // if all good
        if ($good) {
            $db->addCandidate($id, $ward, $pid, $post);
            errorMsg("Canidate entered");
        }
    }
?>
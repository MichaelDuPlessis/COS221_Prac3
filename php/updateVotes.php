<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        session_start();
        if ($_SESSION["voted"] === true) {
            echo "<script> alert('You have already voted'); </script>";
        } else {
            $id = $_SESSION["id"];
            $db->setVoted($id);
            
            $canID = $candidates[$_POST["candidate"]]["id"];
            $db->addCanVote($canID, $wardID);
    
            $pID = $parties[$_POST["party"]]["pID"];
            $db->addPartyVote($pID, $wardID);
            if ($isLocal) {
                $pdID = $parties[$_POST["dparty"]]["pID"];
                $db->addPartyVote($pdID, $wardID);
            }

            $_SESSION["voted"] = true;
        }
    }
?>
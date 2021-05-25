<?php
    include_once "./php/database.php";

    session_start();
    $wardID = $_SESSION["wardID"];
    $wardID = 2; // temp
    $db = Database::instance();
    $candidates = $db->getCandidates($wardID);

    $i = 0;
    foreach ($candidates as $candidate) {
        echo "<input type='radio' class='candidate' name='candidate' value='" . $i . "'>";
        echo "<label class='voting' for='candidate'>" . $candidate["fname"] . " " . $candidate["lname"] . "</label><br>";
        $i++;
    }
?>
<?php
    include_once "./php/database.php";

    session_start();
    $wardID = $_SESSION["wardID"];
    $wardID = 2; // temp
    $db = Database::instance();
    $isLocal = $db->isLocal($wardID);
    $parties = null;
    if (!$isLocal)
        $parties = $db->getParties($wardID, 'a');
    else {
        echo "<h1>Local</h1>";
        $parties = $db->getParties($wardID, 'l');
    }

    $i = 0;
    foreach ($parties as $party) {
        echo "<input type='radio' class='party' name='party' value='".$i."'>";
        echo "<label class='voting' for='party'>" . $party["name"] . " (" . $party["abb"] . ")" . "</label><br>";
        $i++;
    }

    if ($isLocal) {
        echo "<h1>District</h1>";
        $dParties = $db->getParties($wardID, 'd');
        $j = 0;
        foreach ($dParties as $party) {
            echo "<input type='radio' class='party' name='dparty' value='" . $j . "'>";
            echo "<label class='voting' for='dparty'>" . $party["name"] . " (" . $party["abb"] . ")" . "</label><br>";
            $i++;
        }
    }
?>
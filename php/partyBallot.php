<?php
    include_once "./php/database.php";

    // session_start();
    $wardID = $_SESSION["wardID"];
    $db = Database::instance();
    $isLocal = $db->isLocal($wardID);
    $parties = null;
    if (!$isLocal)
        $parties = $db->getParties($wardID, 'a');
    else {
        echo "<h2>Local</h2>";
        $parties = $db->getParties($wardID, 'l');
    }

    $i = 0;
    foreach ($parties as $party) {
        echo "<input type='radio' class='party' name='party' value='".$i."'>";
        echo "<label class='voting' for='party'>" . $party["name"] . " (" . $party["abb"] . ")" . "</label><br>";
        $i++;
    }

    if ($isLocal) {
        echo "<h2>District</h2>";
        $dParties = $db->getParties($wardID, 'd');
        $j = 0;
        foreach ($dParties as $party) {
            echo "<input type='radio' class='party' name='dparty' value='" . $j . "'>";
            echo "<label class='voting' for='dparty'>" . $party["name"] . " (" . $party["abb"] . ")" . "</label><br>";
            $i++;
        }
    }
?>
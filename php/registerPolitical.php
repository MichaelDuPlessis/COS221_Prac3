<?php
    include_once "./php/database.php";
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $party_name = $_POST["pname"];
        $party_abb = $_POST["abrv"];

        $db = Database::instance();
        $db->addParty($party_name, $party_abb);
    }
?>
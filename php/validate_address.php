<?php

    session_start();

    $id = $_SESSION["id"];
    require_once "./php/database.php";
    
    $db = Database::instance();
    
    $newAddress = $newAddressErr = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") //process form data
    {
        echo '<script> console.log("hi")</script>';
        if(empty(trim($_POST["address"])))
            $newAddressErr = "Please enter an address";
        else $newAddress = trim($_POST["address"]);

        if (empty($newAddressErr))
        {
            $db->updateUserAddress($id,$newAddress);
        }
        else {
            $newAddressErr = "Please enter an address";
        }
    }

?>
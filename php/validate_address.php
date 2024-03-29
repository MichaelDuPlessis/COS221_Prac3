<?php

    session_start();

    $id = $_SESSION["id"];
    require_once "./php/database.php";
    
    $db = Database::instance();
    
    $newAddress = $newAddressErr = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") //process form data
    {
        
        if(empty($_POST["address"]))
            $newAddressErr = "Please enter an address";
        else $newAddress = $_POST["address"];

        if (empty($newAddressErr))
        {
            $db->updateUserAddress($id,$newAddress);
        }
        else {
            $newAddressErr = "Please enter an address";
        }
    }

?>
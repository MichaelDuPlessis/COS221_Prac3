<?php
    include_once "./php/database.php";
    include_once "./php/password.php";

    $nameErr = "";
    $surnameErr = "";
    $mnameErr = "";
    $emailErr = "";
    $idErr = "";
    $passErr = "";
    $cellErr = "";
    $emailErr = "";
    $wardErr = "";
    
    if($_SERVER["REQUEST_METHOD"] === "POST") //process form data
    {
        $id = $_POST["id"];
        $email = $_POST["email"];
        $cell = $_POST["cellphone"];
        $pass = $_POST["psw"];
        $ward = $_POST["wardID"];

        $good = true;

        $db = Database::instance();

        // id
        // if ($db->findId($id)) {
        //     $idErr = "ID already regsitered";
        //     $good = false;
        // } else
        //     $idErr = "";

        // if (strlen($id) !== 0 && strlen($id) !== 13) {
        //     $idErr = "Invalid ID";
        //     $good = false;
        // } else
        //     $idErr = "";

        // email
        // if (strlen($email) !== 0) {
        //     if ($db->checkEmailExists($email)) {
        //         $emailErr = "Email already regsitered";
        //         $emailErr = false;
        //     } else
        //         $emailErr = strlen($email) === 0 ? "" : $emailErr;
        
        //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //         $emailErr = "Invalid email";
        //         $emailErr = false;
        //     } else
        //         $emailErr = strlen($email) === 0 ? "" : $emailErr;
        // }

        // cell phone
        // $regexCell = "/d{10}/";
        // if (strlen($cell) !== 0 && !preg_match($regexCell, $cell)) {
        //     $cellErr = "Invalid phone number";
        //     $good = false;
        // } else
        //     $cellErr = "";

        // password
        // $regexPass = "/^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#$%^&*])(?=.{8,})/";
        // if (strlen($pass) !== 0 && !preg_match($regexPass, $pass)) {
        //     $passErr = "Invalid password";
        //     $good = false;
        // } else
        //     $passErr = "";

        // ward
        // if (!$db->checkWardExists($ward)) {
        //     $wardErr = "No such ward exists";
        //     $good = false;
        // } else
        //     $wardErr = "";

        // if all good
        if ($good) {
            $db->addUser($_POST["id"], $_POST["name"], $_POST["middle_name"], $_POST["surname"], $cell, $_POST["email"], $_POST["address"], hashPass($_POST["psw"]), $ward);
        }
    }
?>
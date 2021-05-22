<?php
    include_once "./php/database.php";
    include_once "./php/password.php";

    $id = $_POST["id"];
    $email = $_POST["email"];
    $cell = $_POST["cell"];
    $pass = $_POST["pass"];

    $good = true;
    $nameErr = "";
    $surnameErr = "";
    $mnameErr = "";
    $emailErr = "";
    $idErr = "";
    $passErr = "";
    $cellErr = "";
    $emailErr = "";

    $db = Database::instance();

    if ($db->findId($id)) {
        $idErr = "ID already regsitered";
        $good = false;
    } else
        $idErr = "";

    if ($db->findEmail($email)) {
        $emailErr = "Email already regsitered";
        $emailErr = false;
    } else
        $emailErr = strlen($email) === 0 ? "" : $emailErr;

    $regexEmail = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
    if (!preg_match($regexEmail, $email)) {
        $emailErr = "Invalid email";
        $emailErr = false;
    } else
        $emailErr = strlen($email) === 0 ? "" : $emailErr;

    $regexCell = "/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/";
    if (!preg_match($regexCell, $cell)) {
        $cellErr = "Invalid phone number";
        $good = false;
    } else
        $cellErr = "";

    $regexPass = "/^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#$%^&*])(?=.{8,})/";
    if (!preg_match($regexPass, $pass)) {
        $passErr = "Invalid password";
        $good = false;
    } else
        $passErr = "";

    if ($good) {
        $db->addUser($_POST["id"], $_POST["name"], $_POST["mname"], $_POST["surname"], $_POST["email"], $_POST["cell"], hashPass($_POST["pass"]));
    }
?>
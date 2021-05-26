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
        if ($db->findId($id) == 1) {
            $idErr = "ID already regsitered";
            $good = false;
        } else
            $idErr = "";

        if (strlen($id) !== 0 && strlen($id) !== 13) {
            $idErr = "Invalid ID";
            $good = false;
        } else
            $idErr = "";

        // email
        if (strlen($email) != 0) {
            if ($db->checkEmailExists($email) == 1) {
                $emailErr = "Email already regsitered";
                $emailErr = false;
            } else
                $emailErr = strlen($emailErr) === 0 ? "" : $emailErr;
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email";
                $emailErr = false;
            } else
                $emailErr = strlen($emailErr) === 0 ? "" : $emailErr;
        }

        // cell phone
        if (strlen($cell) !== 0) {
            $regexCell = "/\d{10}/";
            if (!preg_match($regexCell, $cell)) {
                $cellErr = "Invalid phone number";
                $good = false;
            } else
            $cellErr = "";
            
            if ($db->checkCellExists($cell) == 1) {
                $cellErr = "Cellphone number already registered";
                $good = false;
            } else
                $cellErr = strlen($cellErr) === 0 ? "" : $cellErr;
        }

        // password
        // $regexPass = "/^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#$%^&*])(?=.{8,})/";
        // if (strlen($pass) !== 0 && !preg_match($regexPass, $pass)) {
        //     $passErr = "Invalid password";
        //     die("hrere");
        //     $good = false;
        // } else
        //     $passErr = "";

        // ward
        if (!$db->checkWardExists($ward)) {
            $wardErr = "No such ward exists";
            $good = false;
        } else
        $wardErr = "";
        
        // if all good
        if ($good) {
            $db->addUser($_POST["id"], $_POST["name"], $_POST["middle_name"], $_POST["surname"], $cell, $_POST["email"], $_POST["address"], hashPass($_POST["psw"]), $ward);
            session_start();
                        
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $name;
            $_SESSION["wardID"] = $ward;

            
            if ($_POST["staff"] == "isIECStaff") {
                $db->addIEC($id);
                $_SESSION["isIEC"] = true;
            } else {
                $_SESSION["isIEC"] = false;
            }

            $_SESSION["voted"] = false;
            
            if (isset($_SESSION["isIEC"]) && $_SESSION["isIEC"] === true) {
                echo '<script> window.location.href = "./staffHome.php" </script>'; 
            }
            else {
                echo '<script> window.location.href = "./voterHome.php" </script>'; 
            }
        }
    }
?>
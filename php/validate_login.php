<?php 
    session_start(); 

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
    {
        if (isset($_SESSION["isIEC"]) && $_SESSION["isIEC"] === true)
            header("location: "); //if logged in, redirect to homepage
        else header("location: ");
        exit;
    }

    $id = $password = "";
    $idErr = $passwordErr = $loginErr = "";

    require_once "./php/database.php";

    $db = Database::instance();

    if($_SERVER["REQUEST_METHOD"] == "POST") //process form data
    {
        if(empty(trim($_POST["id"])))
            $idErr = "Please enter email";
        else $id = trim($_POST["id"]);
            
        //validate password
        if(empty(trim($_POST["password"])))
        $passwordErr = "Please enter password";
        else $password = trim($_POST["password"]);
        
        if(empty($idErr) && empty($passwordErr))
        {
            
            if ($db->findId($id) === true) {
                                
                if($db->validateUserPass($id,$password))
                {
                    session_start();
                    
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $name = $db->getUserName($id);
                    $_SESSION["name"] = $name;
                    $wardID = $db->getUserWardID($id);
                    $_SESSION["wardID"] = $wardID;
    
                    if ($db->checkUserinIEC($id) === true)
                        $_SESSION["isIEC"] = true;
                    else $_SESSION["isIEC"] = false;
    
                    if ($db->checkUserVoted($id) === true)
                        $_SESSION["voted"] = true;
                    else $_SESSION["voted"] = false;

                }    
                else
                {
                    $idErr = "Invalid email or password";
                    $passwordErr = "Invalid email or password";
                }

            }
            else {
                $idErr = "Id not found";
                $passwordErr = "";
            }
        }
    
    }
    
    
    
?>
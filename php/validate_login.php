<?php 
    
    session_start(); 
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
    {
        if (isset($_SESSION["isIEC"]) && $_SESSION["isIEC"] === true) {
            echo '<script> window.location.href = "./staffHome.php" </script>'; 
        }
        else {
            echo '<script> window.location.href = "./voterHome.php" </script>'; 
        }
    }
    else {
        $id = $password = "";
        $idErr = $passwordErr = $loginErr = "";
        
        require_once "./php/database.php";
        require_once "./php/password.php";
        
        $db = Database::instance();
        
        if($_SERVER["REQUEST_METHOD"] == "POST") //process form data
        {
            if(empty(trim($_POST["id"])))
            $idErr = "Please enter ID";
            else
            $id = trim($_POST["id"]);
            
            //validate password
            if(empty(trim($_POST["psw"])))
            $passwordErr = "Please enter password";
            else $password = trim($_POST["psw"]);
            
            if(empty($idErr) && empty($passwordErr))
            {
                
      
                if ($db->findId($id) === true) {
                    
                    $stored = $db->getUserPass($id);
                    
                    if(checkPass($password,$stored))
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

                        
                        if (isset($_SESSION["isIEC"]) && $_SESSION["isIEC"] === true) {
                            echo '<script> window.location.href = "./voterHome.php" </script>'; 
                        }
                        else {
                            echo '<script> window.location.href = "./voterHome.php" </script>'; 
                        }

                        header("Refresh:0");
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
      
        
    }

    

      
    
?>
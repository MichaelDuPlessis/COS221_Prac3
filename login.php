<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Municipality Elections</title>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once("./php/header.php") ?>
        <?php include_once("./php/validate_login.php"); ?>


        <div class="center1">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="imgcontainer">
                    <img src="img/login.png" alt="Avatar" class="avatar">
                </div>
            
                <div class="container">
                    <label for="id"><b>Username</b></label>
                    <span class="invalid"> <?php echo $idErr; ?></span>
                    <input type="tel" pattern="[0-9]*" placeholder="Enter ID" name="id" required>

                    <label for="psw"><b>Password</b></label>
                    <span class="invalid"> <?php echo $passwordErr; ?></span>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                        
                    <button type="submit">Login</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <span class="signup">Not Registered? <a href="signup.php">SignUp</a></span>
                </div>
            </form>
        </div>
        <!--ACTUAL LOGGING PAGE
        <div class="center1">
            <h1>Login</h1>
            <form method="post">
                <div class="txt_field">
                    <input type="text" name = "id" required>
                    <span class = "invalid"><?php echo $idErr; ?></span>
                    <label>ID Number</label>
                </div>
                <div class="txt_field">
                    <input type="password" name = "password" required>
                    <span class = "invalid"><?php echo $passwordErr; ?></span>
                    <label>Password</label>
                </div>
                <input type="submit" value="Login">
                <div class="signup_link">
                    Not registered? <a href="signup.php">Signup </a>
                </div>

            </form>

        </div>-->

        <script>
            function refresh() {
                window.location.href = './php/checkLogged.php';
            }
        </script>

    </body>
</html>
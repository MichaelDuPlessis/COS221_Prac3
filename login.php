<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Elections</title>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once("php/header.php") ?>

        <!--ACTUAL LOGGING PAGE-->
        <div class="center">
            <h1>Login</h1>
            <form method="post">
                <div class="txt_field">
                    <input type="text" name = "id" required>
                    <span class = "invalid"><?php echo $passwordErr; ?></span>
                    <label>ID Number</label>
                </div>
                <div class="txt_field">
                    <input type="password" name = "password" required>
                    <span class = "invalid"><?php echo $passwordErr; ?></span>
                    <label>Password</label>
                </div>
                <div class="pass">Forgot Password? </div>
                <input type="submit" value="Login">
                <div class="signup_link">
                    Not registered? <a href="signup.php">Signup </a>
                </div>

            </form>

        </div>
    </body>
</html>
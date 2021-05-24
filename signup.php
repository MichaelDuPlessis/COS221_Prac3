<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Elections</title>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>

        <!-- php -->
    </head>
    <body>
        <?php include_once "./php/validate_signup.php"; ?>
        <?php include_once("php/header.php"); ?>

        <!--SIGN UP REG PAGE-->
        <div class="center">
            <h1>Register</h1>
            <form method="post">
                <div class="txt_field">
                    <input type="text" name="id" required>
                    <span class="invalid"><?php echo $idErr; ?></span>
                    <label>ID Number</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="name" required>
                    <span class="invalid"><?php echo $nameErr; ?></span>
                    <label>Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="mname" required>
                    <span class="invalid"><?php echo $mnameErr; ?></span>
                    <label>Middle-Names</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="surname" required>
                    <span class="invalid"><?php echo $surnameErr; ?></span>
                    <label>Surname</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="cell" required>
                    <span class="invalid"><?php echo $cellErr; ?></span>
                    <label>Cellphone</label>
                </div>
                <div class="txt_field">
                    <input type="text"  name="email" required>
                    <span class="invalid"><?php echo $emailErr; ?></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="address" required>
                    <span class="invalid"></span>
                    <label>Address</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="ward" required>
                    <span class="invalid"><?php echo $wardErr; ?></span>
                    <label>Ward</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="pass" required>
                    <span class="invalid"><?php echo $passErr; ?></span>
                    <label>Password</label>
                </div>
                <input type="submit" value="Login" name="conpass">
                <div class="signup_link">
                    Already registered? <a href="login.php">Sign Up</a>
                </div>
            </form>
        </div>
    </body>
</html>
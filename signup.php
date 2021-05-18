<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Elections</title>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>

        <!-- php -->
        <?php include_once "./php/validate_signup"; ?>
    </head>
    <body>
        <?php include_once("php/header.php") ?>

        <!--SIGN UP REG PAGE-->
        <div class="center">
            <h1>Register</h1>
            <form method="post">
                <div class="txt_field">
                    <input type="text" required name="id">
                    <span class="invalid"><?php echo $idErr; ?></span>
                    <label>ID Number</label>
                </div>
                <div class="txt_field">
                    <input type="text" required name="name">
                    <span class="invalid"><?php echo $nameErr; ?></span>
                    <label>Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" required name="mname">
                    <span class="invalid"><?php echo $mnameErr; ?></span>
                    <label>Middle-Names</label>
                </div>
                <div class="txt_field">
                    <input type="text" required name="surname">
                    <span class="invalid"><?php echo $surnameErr; ?></span>
                    <label>Surname</label>
                </div>
                <div class="txt_field">
                    <input type="text" required name="cell">
                    <span class="invalid"><?php echo $cellErr; ?></span>
                    <label>Cellphone</label>
                </div>
                <div class="txt_field">
                    <input type="text" required name="email">
                    <span class="invalid"><?php echo $emailErr; ?></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="text" required name="address">
                    <span class="invalid"><?php echo $addressErr; ?></span>
                    <label>Address</label>
                </div>
                <div class="txt_field">
                    <input type="password" required name="pass">
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
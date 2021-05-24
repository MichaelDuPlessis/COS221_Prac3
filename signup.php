<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Municipality Elections</title>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once("php/header.php") ?>

        <div class="center">
            <form method="post">
                <div class="imgcontainer">
                    <img src="img/signup.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="id"><b>SA ID Number</b></label>
                    <input type="text" placeholder="Enter SA ID Number" name="id" required>

                    <label for="name"><b>Name</b></label>
                    <input type="text" placeholder="Enter Name" name="name" required>

                    <label for="middle_name"><b>Middle Name/s</b></label>
                    <input type="text" placeholder="Enter Middle Name/s" name="middle_name">

                    <label for="surname"><b>Surname</b></label>
                    <input type="text" placeholder="Enter Surname" name="surname" required>

                    <label for="cellphone"><b>Cellphone</b></label>
                    <input type="text" placeholder="Enter Cellphone" name="cellphone" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email">

                    <label for="address"><b>Address</b></label>
                    <input type="text" placeholder="Enter Address" name="address" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                        
                    <button type="submit">Sign Up</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <span class="signup">Already Registered? <a href="login.php">Login</a></span>
                </div>
            </form>
        </div>




        <!--SIGN UP REG PAGE
        <div class="center" id="signup">
            <h1>Register</h1>
            <form method="post">
                <div class="txt_field">
                    <input type="text" required>
                    <span></span>
                    <label>ID Number</label>
                </div>
                <div class="txt_field">
                    <input type="text" required>
                    <span></span>
                    <label>Name</label>
                </div>
                <div class="txt_field">
                    <input type="text">
                    <span></span>
                    <label>Middle-Names</label>
                </div>
                <div class="txt_field">
                    <input type="text" required>
                    <span></span>
                    <label>Surname</label>
                </div>
                <div class="txt_field">
                    <input type="text" required>
                    <span></span>
                    <label>Cellphone</label>
                </div>
                <div class="txt_field">
                    <input type="text" required>
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="text" required>
                    <span></span>
                    <label>Address</label>
                </div>
                <div class="txt_field">
                    <input type="password" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <input type="submit" value="Sign Up">
                <div class="signup_link">
                    Already registered? <a href="login.php">Log In </a>
                </div>

            </form>

        </div>-->
    </body>
</html>
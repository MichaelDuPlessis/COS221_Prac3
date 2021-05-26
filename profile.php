<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <link href="css/stylesheet2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php 
        require_once("php/database.php");
        require_once ("php/validate_address.php");

        session_start();
        
        $db = Database::instance();
        $id = $_SESSION["id"];

        $info = $db->getUserDetailsAll($id);
    ?>
    
        <img src="img/banner.jpg.png" alt="banner"/>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="voterHome.php" class="home" onclick="closeNav()">Home</a>
            <a href="profile.php" class="profile" onclick="closeNav()">Profile</a>
            <a href="ballot.php" class="ballot" onclick="closeNav()">Voting Ballot</a>
            <a href="#" class="logout"  onclick="logout()">Log Out</a>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer;color: white; background-color: black" onclick="openNav()">&#9776; menu</span>
        </div>

        <div class="content" id="content">
        <div class='voterContent'>
            <h1>Profile</h1>
                <table>
                    <tr>
                        <td>
                            <label for='id'><b>SA ID Number  </b></label>
                        </td>
                        <td>
                            <input type='text' placeholder=<?php echo $id;?> name='id' readonly> <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='name'><b>Name  </b></label>
                        </td>
                        <td>
                            <input type='text' placeholder=<?php echo $info["f_name"];?>  name='name' readonly> <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='middle_name'><b>MiddleName/s </b></label>
                        </td>
                        <td>
                            <input type='text' placeholder=<?php echo $info["m_name"];?> name='middle_name' readonly> <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='surname'><b>Surname  </b></label>
                        </td>
                        <td>
                            <input type='text' placeholder=<?php echo $info["l_name"];?> name='surname' readonly> <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='cellphone'><b>Cellphone  </b></label>
                        </td>
                        <td>
                            <input type='text' placeholder=<?php echo $info["cell"];?> name='cellphone' readonly> <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='email'><b>Email  </b></label>
                        </td>
                        <td>
                           <input type='text' placeholder=<?php echo $info["email"];?> name='email' readonly> <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='address'><b>Address </b></label>
                        </td>
                        <td>
                            <form method="post">
                                <input type='text' name = "address" placeholder=<?php echo $info["address"];?> required> <br/>
                                <button type='submit'>Update </button>
                            </form>
                        </td>
                    </tr>
               </table>
            </div>
        </div>

        <script>
            
            function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }
    
            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "black";
            }

            function logout() {
                window.location.href = './php/logout.php';
            }

        </script>
    </body>
</html>
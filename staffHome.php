<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Staff Home</title>
        <meta charset="UTF-8">
        <link href="css/stylesheet2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <img src="img/banner.jpg.png" alt="banner"/>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="staffHome.php" class="home" onclick="closeNav()">Home</a>
            <a href="voterReg.php" class="voterReg" onclick="closeNav()">Voter Registration</a>
            <a href="elecInfo.php" class="elecInfo" onclick="closeNav()">Election Information</a>
            <a href="#" class="logout" onclick="logout()">Log Out</a>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer;color: white; background-color: black" onclick="openNav()">&#9776; menu</span>
        </div>

        <div class="content" id="content">
            <div class="bg-text">WELCOME</div>
            <img class="homeImg" src="img/election.jpg" alt="voteImg"/>
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
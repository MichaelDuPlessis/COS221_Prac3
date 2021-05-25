<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <link href="css/stylesheet2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <img src="img/banner.jpg.png" alt="banner"/>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="voterHome.php" class="home" onclick="home()">Home</a>
            <a href="profile.php" class="profile" onclick="profile()">Profile</a>
            <a href="ballot.php" class="ballot" onclick="ballot()">Voting Ballot</a>
            <a href="#" class="logout" onclick="logout()">Log Out</a>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer;color: white; background-color: black" onclick="openNav()">&#9776; menu</span>
        </div>

        <div class="content" id="content">
            <div class="bg-text">HOME</div>
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
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Staff Portal</title>
        <meta charset="UTF-8">
        <link href="css/stylesheet2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once("php/header.php") ?>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#" class="home" onclick="home()">Home</a>
            <a href="#" class="VoterRegistration" onclick="register()">Voter Registration</a>
            <a href="#" class="VotingInfo" onclick="electionInfo()">Election Information</a>
            <a href="#" class="Election Reports" onclick="report()">Election Report</a>
            <a href="#" class="logout" onclick="logout()">Log Out</a>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer;color: white; background-color: black" onclick="openNav()">&#9776; menu</span>
        </div>

        <div class="content" id="content">
            <div class="bg-text">HOME</div>
            <div class="innerContent"></div>
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

        function home(){
            document.getElementById("content").innerHTML = "<div class='bg-text'>HOME</div>";
            closeNav();
        }

        function register(){
            document.getElementById("content").innerHTML = "<div class='voterContent'>" +
            "<h1>Voter Information</h1>"+
                "<table>"+
                "<tr>"+
                    "<th>ID Number</th>"+
                    "<th>Name</th>"+
                    "<th>MiddleName/s</th>"+
                    "<th>Surname</th>"+
                    "<th>Cellphone</th>"+
                    "<th>Email</th>"+
                    "<th>Address</th>"+
                "</tr>"+
                "<tr>"+
                    "<td>Hello</td>"+
                "</tr>"+
                "<tr>"+
                    "<td>Good day</td>"+
                "</tr>"+
                "</table>"+
                "<button type='submit"
            "</div>";
            closeNav();
        }

        function electionInfo(){
            document.getElementById("content").innerHTML = "<h1>Ballot</h1>";
            closeNav();
        }

        function report(){
            document.getElementById("content").innerHTML = "<h1>Info</h1>";
            closeNav();
        }        

        function logout() {
            console.log('here');
            <?php
                 session_unset();
            ?>
            window.location.href = "./login.php";
            
        }
        
        </script>
    </body>
</html>
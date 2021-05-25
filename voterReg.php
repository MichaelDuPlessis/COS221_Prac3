<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Voter Registration</title>
        <meta charset="UTF-8">
        <link href="css/stylesheet2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <img src="img/banner.jpg.png" alt="banner"/>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="staffHome.php" class="home" onclick="closeNav()">Home</a>
            <a href="voterReg.php" class="voterReg" onclick="closeNav()">Voter Registration</a>
            <a href="elecInfo.php" class="electionInfo" onclick="closeNav()">Election Information</a>
            <a href="elecReport.php" class="elecReport" onclick="closeNav()">Election Report</a>
            <a href="#" class="logout">Log Out</a>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer;color: white; background-color: black" onclick="openNav()">&#9776; menu</span>
        </div>

        <div class="content" id="content">
        <div class='voterInfo'>
            <h1>Voter Information</h1>
                <table>
                <tr>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>MiddleName/s</th>
                    <th>Surname</th>
                    <th>Cellphone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Approve Registration</th>
                </tr>
                <tr>
                    <td>0105020082084</td>
                    <td>Cara</td>
                    <td>Mia</td>
                    <td>Grobler</td>
                    <td>0829772356</td>
                    <td>cara@gmail.com</td>
                    <td>Cornwall Hill</td>
                    <td><input type="checkbox" name="approve"></td>
                </tr>
                <tr>
                    <td>Good day</td>
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
        </script>
    </body>
</html>
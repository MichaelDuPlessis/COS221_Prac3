<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Municipality Elections</title>
        <meta charset="UTF-8">
        <link href="css/stylesheet2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once("php/header.php") ?>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#" class="home" onclick="home()">Home</a>
            <a href="#" class="profile" onclick="profile()">Profile</a>
            <a href="#" class="ballot" onclick="ballot()">Voting Ballot</a>
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

        function home(){
            document.getElementById("content").innerHTML = "<div class='bg-text'>HOME</div>";
            closeNav();
        }

        function profile(){
            document.getElementById("content").innerHTML = ""+
            "<div class='voterContent'>" +
            "<h1>Profile</h1>"+
                "<table>"+
                    "<tr>"+
                        "<td>"+
                            "<label for='id'><b>SA ID Number  </b></label>"+
                        "</td>"+
                        "<td>"+
                            "<input type='text' placeholder='Enter SA ID Number' name='id' readonly> <br/>"+
                        "</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>"+
                            "<label for='name'><b>Name  </b></label>"+
                        "</td>"+    
                        "<td>"+
                            "<input type='text' placeholder='Enter Name'  name='name' readonly> <br/>"+
                        "</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>"+
                            "<label for='middle_name'><b>MiddleName/s </b></label>"+
                        "</td>"+
                        "<td>"+
                            "<input type='text' placeholder='Enter Middle Name/s' name='middle_name' readonly> <br/>"+
                        "</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>"+
                            "<label for='surname'><b>Surname  </b></label>"+
                        "</td>"+
                        "<td>"+
                            "<input type='text' placeholder='Enter Surname' name='surname' readonly> <br/>"+
                        "</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>"+
                            "<label for='cellphone'><b>Cellphone  </b></label>"+
                        "</td>"+
                        "<td>"+
                            "<input type='text' placeholder='Enter Cellphone' name='cellphone' readonly> <br/>"+
                        "</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>"+
                            "<label for='email'><b>Email  </b></label>"+
                        "</td>"+
                        "<td>"+
                            "<input type='text' placeholder='Enter Email' name='email' readonly> <br/>"+
                        "</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>"+
                            "<label for='address'><b>Address  </b></label>"+
                        "</td>"+
                        "<td>"+
                            "<input type='text' placeholder='Enter Address' name='address' required> <br/>"+
                        "</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>"+
                            "<label for='psw><b>Password  </b></label>"+
                        "</td>"+
                        "<td>"+
                            "<input type='password' placeholder='Enter Password' name='psw' readonly>"+
                        "</td>"+
                    "</tr>"+
               "</table>"+
               "<button type='submit'>Update </button>"+
            "</div>";
            closeNav();
        }

        function ballot(){
            document.getElementById("content").innerHTML = "<div class='ballotContent'>"+
                "<div class='candidateContent'>"+
                    "<h2> Candidate Vote </h2>"+
                        "<div class='candidate'>"+
                            "<input type='radio' id='candidate' name='candidate' value='c1'>"+
                            "<label id='voting' for='candidate'>Cara Grobler</label><br>"+

                            "<input type='radio' id='candidate' name='candidate' value='c1'>"+
                            "<label id='voting' for='candidate'>Michael du Plessis</label><br>"+

                            "<input type='radio' id='candidate' name='candidate' value='c2'>"+
                            "<label id='voting' for='candidate'>Richard Lastrucci</label><br>"+
                        "</div>"+
                "</div>"+
                "<div class='partyContent'>"+
                    "<h2>   Party Vote </h2>"+
                    "<div class='party'>"+
                            "<input type='radio' id='party' name='party' value='p1'>"+
                            "<label id='voting' for='party'>ANC</label><br>"+

                            "<input type='radio' id='party' name='party' value='p2'>"+
                            "<label id='voting' for='party'>DA</label><br>"+
                    "</div"+
                "</div>"+
                "<button type='submit' id='voteBtn'>Vote</button>"+
            "</div>";
            closeNav();
        }

        
        function logout() {
            window.location.href = './php/logout.php';
            
        }

        
        
        
        </script>
    </body>
</html>
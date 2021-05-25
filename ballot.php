<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ballot</title>
        <meta charset="UTF-8">
        <link href="css/stylesheet2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <img src="img/banner.jpg.png" alt="banner"/>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="voterHome.php" class="home">Home</a>
            <a href="profile.php" class="profile">Profile</a>
            <a href="ballot.php" class="ballot">Voting Ballot</a>
            <a href="#" class="logout">Log Out</a>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer;color: white; background-color: black" onclick="openNav()">&#9776; menu</span>
        </div>

            <div class="content" id="content">
             <form method="post">
                <div class='ballotContent'>
                    <div class='candidateContent'>
                        <h2> Candidate Vote </h2>
                            <div class='candidate'>
                                <input type='radio' id='candidate' name='candidate' value='c1'>
                                <label id='voting' for='candidate'>Cara Grobler</label><br>

                                <input type='radio' id='candidate' name='candidate' value='c1'>
                                <label id='voting' for='candidate'>Michael du Plessis</label><br>

                                <input type='radio' id='candidate' name='candidate' value='c2'>
                                <label id='voting' for='candidate'>Richard Lastrucci</label><br>
                            </div>
                    </div>
                    <div class='partyContent'>
                        <h2>   Party Vote </h2>
                        <div class='party'>
                                <input type='radio' id='party' name='party' value='p1'>
                                <label id='voting' for='party'>ANC</label><br>

                                <input type='radio' id='party' name='party' value='p2'>
                                <label id='voting' for='party'>DA</label><br>
                        </div>
                    </div>
                    <button type='submit' id='voteBtn'>Vote</button>
                </div>
                </form>
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
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Election Information</title>
        <meta charset="UTF-8">
        <!-- <link href="css/stylesheet2.css" rel="stylesheet" type="text/css"/> -->
    </head>
    <body>
        <img src="img/banner.jpg.png" alt="banner"/>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="staffHome.php" class="home" onclick="closeNav()">Home</a>
            <a href="voterReg.php" class="voterReg" onclick="closeNav()">Voter Registration</a>
            <a href="elecInfo.php" class="elecInfo" onclick="closeNav()">Election Information</a>
            <a href="#" class="logout">Log Out</a>
        </div>

        <div id="main">
            <span style="font-size:30px;cursor:pointer;color: white; background-color: black" onclick="openNav()">&#9776; menu</span>
        </div>

        <div class="content" id="content">
            <div class="electionInfo">
                <h1>Candidate Information</h1>
                    <form method="POST">
                    <table>
                        <tr>
                            <td>
                                <label for='id'><b>SA ID Number  </b></label>
                            </td>
                            <td>
                                <input type='text' placeholder='Enter SA ID Number' name='id' required> <br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='post'><b>Post  </b></label>
                            </td>
                            <td>
                            <input type='text' placeholder='Enter Post' name='post' required> <br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="ward_id"><b>Ward </b></label>
                            </td>
                            <td>
                            <input type='text' placeholder='Enter Ward ID' name='ward_id' required> <br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="party"><b>Party </b></label>
                            </td>
                            <td>
                            <input type='text' placeholder='Enter Party ID' name='party' required> <br/>
                            </td>
                        </tr>
                </table>
                <button type='submit'>Submit </button>
                <?php include_once "./php/validateCanidate.php"; ?>
                </form>
                <form method="POST">
                <h1>Political Party Information</h1>
                <table>
                        <tr>
                            <td>
                                <label for='pname'><b>Party Name  </b></label>
                            </td>
                            <td>
                                <input type='text' placeholder='Enter Political Party Name'  name='pname' required> <br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for='abrv'><b>Abbreviation </b></label>
                            </td>
                            <td>
                                <input type='text' placeholder='Enter Party Abbreviation' name='abrv' required> <br/>
                            </td>
                        </tr>
                </table>
                <button type='submit'>Submit</button>
                <?php include_once "./php/registerPolitical.php"; ?>
                </form>
                </div>
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
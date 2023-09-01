<?php 
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    session_start();
    $hrid = $_SESSION['hrid'];

    $userSQL = "SELECT fname FROM rep WHERE hrid = '$hrid'";
    $userResult = $conn->query($userSQL);

    while($row = $userResult->fetch_assoc()){
        $name = $row['fname'];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/hr/nav/css/home.css">
        <link rel="stylesheet" href="/hr/position/css/position.css">

        <title>Athios</title>
        </div>
    </head>


    <body> 

        <header>
            <div class="nav_container">
                <img src="/athios_logo.jpg" alt="logo" class="logo">
                <nav style="float: left;">
                    <ul>
                        <li><a href="/hr/nav/home.php">Home</a></li>
                        <li><a href="/hr/position/position.html">Create Position</a></li>
                    </ul>
                </nav>
                <!--- nav for home, new position, user creation--->
                <div class="dropdown" style="float:right;margin-right:1%;">
                    <button class="dropbtn"><?php echo $name ?></button>
                    <div class="content" style="margin-right: 1.52%;">
                        <a href="/hr/user/new_user.html">New User</a>
                        <a href="/hr/user/user.php">Account</a>
                        <a href="/hr/login/signout.php">Sign Out</a>

                    </div>
                </div>
            </div>
        </header><br><br><br>  
        <div class="container">
            <form action="http://localhost:3000/hr/php/user_create.php" method="post" style="width:50%;position:relative;left:25%;">
                <fieldset>
                    <legend>New User</legend>
                    <label for="fname" class="ulabel">First name: </label><br>
                    <input type= "text" id="fname" name="fname" class="uinput"><br><br>

                    <label for="lname" class="ulabel">Last Name: </label><br>
                    <input type= "text" id="lname" name="lname" class="uinput"><br><br>

                    <label for="email" class="ulabel">Email: </label><br>
                    <input type= "text" id="email" name="email" class="uinput"><br><br>

                    <label for="pswrd" class="ulabel">Password: </label><br>
                    <input type= "text" id="pswrd" name="pswrd" class="uinput"><br><br>

                    <input type = "submit" value="Create User" style="float: right;">
                </fieldset>
            </form>
        </div>
    </body>
</html>
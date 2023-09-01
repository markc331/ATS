<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';

   session_start();

   $hrid = $_SESSION['hrid'];

   $userSQL = "SELECT fname FROM rep WHERE hrid = '$hrid'";
   $userResult = $conn->query($userSQL);

   while($urow = $userResult->fetch_assoc()){
       $name = $urow['fname'];
   }

   $sql = "SELECT * FROM rep WHERE hrid='$hrid'";

   $result = $conn->query($sql);

   $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/hr/nav/css/home.css">
        <title>Athios</title>
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
                        <a href="/hr/user/new_user.php">New User</a>
                        <a href="/hr/user/user.php">Account</a>
                        <a href="/hr/login/signout.php">Sign Out</a>

                    </div>
                </div>
            </div>
        </header><br>

        <div class="container">
            <fieldset>
                <legend>Account Information</legend>
                <div class="info">
                <?php
                    echo "HR ID: ".$row['hrid']."<br>";
                    echo "First Name: ".$row['fname']."<br>";
                    echo "Last Name: ".$row['email']."<br>";
                    echo "Password: *********";
                ?></div>
            </fieldset>
        </div>    
    </body>
</html>
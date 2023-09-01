<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    session_start();
    $hrid = $_SESSION['hrid'];
    $_SESSION['pid'] = $_POST['pid'];
    $pid = $_SESSION['pid'];

    $userSQL = "SELECT fname FROM rep WHERE hrid = '$hrid'";
    $userResult = $conn->query($userSQL);

    while($row = $userResult->fetch_assoc()){
        $name = $row['fname'];
    }

    $application= "SELECT * FROM applicant WHERE pid='$pid'";
    $appResults = $conn->query($application);

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/hr/nav/css/home.css">
        <title>Athios</title>
        <link rel="stylesheet" href="/hr/position/css/position.css">

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
        </header><br><br>  
        <form action="http://localhost:3000/hr/position/position_details.php" method="post">
            <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>">
            <input type="submit" value="Return to Position Details" class="prev">
        </form><br><br><br>

        <a style="float:left;margin-left:2%;">Applicant ID</a>
        <a style="float:left;margin-left:9%;">Applicant Name</a><br><br>
        <?php 
                if($appResults->num_rows >0){
                    while($approw = $appResults->fetch_assoc()){
                            $position = $approw['aid']. "\t\t\t\t\t\t\t". $approw['fname']." ".$approw['mname']." ".$approw['lname'];
                            echo "<form action ='http://localhost:3000/hr/applicants/applicant_details.php' method = 'post'>
                                        <input type = 'hidden' id='aid' name= 'aid' value='".$approw['aid']."'>
                                        <input type = 'submit' value ='$position' id='title' name='title' class='app'>
                                    </form><br>";
                    }
                }else{
                    echo "No Applicants";
                }
        ?>
    </body>
</html>
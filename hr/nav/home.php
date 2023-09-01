<?php 
    include '/Users/mac/Documents/ATS/general/db_connect.php';

    $sql = 'SELECT * FROM position';
            
    $result = $conn->query($sql);

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
        <title>Athios</title>
    </head>


    <body> 
        <header>
            <div class="nav_container">
                <img src="/athios_logo.jpg" alt="logo" class="logo">
                <nav style="float: left;">
                    <ul>
                        <li><a href="/hr/nav/home.php">Home</a></li>
                        <li><a href="/hr/position/position.php">Create Position</a></li>
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
        
        <?php
            if(isset($_GET['success'])){
                echo "<div class='applied_box'><h3>".$_GET['success']."</h3></div>";
            }
        ?>

        <div class="container">
            <h2 style="position:relative;left:2%;">Open Positions:</h2>
            <?php 
                if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                            $count = 0;
                            $pid = $row['pid'];
                            $app = "SELECT DISTINCT(aid) FROM applicant WHERE pid ='$pid' ";
                            $appResult = $conn->query($app);
                            if($appResult->num_rows >0){
                                while($aid = $appResult->fetch_assoc()){
                                    $count ++;
                                }
                            }
                            $position = $row['title']."\n\n\t".
                                        $row['location']."\n\t".
                                        "$".$row['min']." - "."$". $row['max']."\t".$row['type']."\n\t".
                                        $row['sday']." - ".$row['eday']."\t".$row['sshift']." - ".$row['eshift'].
                                        "\n\n\tDescription:\n\t".$row['description'].
                                        "\n\nPosted: ".$row['date']."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tNumber of Applicants: ".$count;
                            echo "<form action ='http://localhost:3000/hr/position/position_details.php' method = 'post' style='text-align:center;'>
                                        <input type = 'submit' value ='$position' id='title' name='title' class='pos'>
                                        <input type='hidden' id='pid' name = 'pid' value='".$row['pid']."'>
                                    </form><br>";
                    }
                }else{
                    echo "No Positions";
                }
                ?>
        </div>    
    </body>
</html>
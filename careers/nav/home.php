<?php 
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    $sql = 'SELECT * FROM position';
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/careers/nav/nav.css">
        <title>home</title>
    </head>

    <body> 
        <header>
            <div class="nav_container">            
                <div class="menu">
                    <img src="https://img1.wsimg.com/isteam/ip/c0c68920-e75d-4537-ba2e-968973ac6ffb/571f223e-3f59-44f4-b339-1fe51ac030d8.png" alt="logo" class="logo"> 
                    <nav style="float: left;">
                        <ul>
                            <li><a href="/careers/nav/home.php">Home</a></li>
                            <li><a href="/careers/nav/search.php">Application Status</a></li>
                        </ul>
                    </nav>
                </div>
                <?php
                if(isset($_GET['success'])){
                echo "<div class='applied_box'><p class='success'>".$_GET['success']."</p></div>";
                }
                ?>
            </div>
        </header>

        <div class="container">
            <div class="box">
                <h1>Careers at Athios</h1>
            </div>
            <h2>Open Positions:</h2><br>
            <?php 
                if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                            $title = $row['title'];
                            echo "<hr><form action ='http://localhost:3000/careers/nav/details.php' method = 'post' style='text-align:center;'>
                                        <div class='pos_box'>
                                            <h3>$title</h3>
                                            <p class='pid'>Position ID: ".$row['pid']."</p>
                                            <h4 class='loc'>".$row['location']." | ".$row['wlocation']." | ".$row['type']." | ".$row['level']." | Posted Since: ".$row['date']."</h4>
                                            <p class='desc'>Description: ".$row['description']."</p>
                                            <input type = 'submit' value='submit'class='pos'>
                                            <input type='hidden' id='pid' name = 'pid' value='".$row['pid']."'>
                                        </div>
                                    </form>";
                    }
                }else{
                    echo "No Positions";
                }
                ?>
        </div>    
    </body><br>
    <div class="block">
        <footer>
            <p>Designed and Developed By: Mark Anthony Castillo</p>
            <p>Applicant Tracking System (Version: Beta)</p>
        </footer>
    </div>
</html>
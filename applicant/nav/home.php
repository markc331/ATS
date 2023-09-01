<?php 
    include '/Users/mac/Documents/ATS/general/db_connect.php';

    $sql = 'SELECT * FROM position';
            
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/applicant/nav/css/home.css">
        <title>home</title>
    </head>

    <body> 
        <header>
            <div class="nav_container">
                <img src="/athios_logo.jpg" alt="logo" class="logo"> 
                <nav style="float: left;">
                    <ul>
                        <li><a href="/applicant/nav/aid_search.php">Application Status</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <?php
            if(isset($_GET['success'])){
                echo "<div class='applied_box'><h3>".$_GET['success']."</h3></div>";
            }
        ?>
        <div class="container">
            <div class="box">
                <h1>Careers at Athios</h1>
            </div>
            <h2>Open Positions:</h2><br>
            <?php 
                if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                            $title = $row['title'];
                            $position = $row['title']."\n\n\t".
                                        $row['location']."\n\t".
                                        "$".$row['min']." - "."$". $row['max']."\t".$row['type']."\n\t".
                                        $row['sday']." - ".$row['eday']."\t".$row['sshift']." - ".$row['eshift'].
                                        "\n\n\tDescription:\n\t".$row['description'].
                                        "\n\nPosted: ".$row['date'];
                            echo "<form action ='http://localhost:3000/applicant/nav/position_details.php' method = 'post' style='text-align:center;'>
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
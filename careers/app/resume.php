<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    $pid = $_POST['pid'];
    $sql = "SELECT * FROM position WHERE pid = '$pid' ";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/careers/app/app.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Athios</title>
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
            </div>
        </header><br><br><br>                        
        <div class="container">
            <p class="title"><?php 
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                                echo $row['title'];
                            }
                        }
            ?></p>
        </div> 
        <form action="http://localhost:3000/careers/app/app.php" method="post" class="newpos" enctype="multipart/form-data">
            <div class="section" id="resume" data-label="Resume" style="height: 400px;">
                    <h2 style="padding:140px 0;">Resume</h2>
                    <div class="right">
                        <label class="box_label" for="resume" height="100px">Drag and Drop Resume Below or Browse Files</label>
                        <input class= "custom-file_input" type="file" id="resume" name="resume">
                    </div>
            </div><br><br><br>
            <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>">
            <input type="submit" value="Next" class="next" style="position: relative; float: right;"><br>
             
        </form><br>
    </body>
    <div class="block" style="position:relative;top:200px;">
        <footer>
            <p>Designed and Developed By: Mark Anthony Castillo</p>
            <p>Applicant Tracking System (Version: Beta)</p>
        </footer>
    </div>
</html>
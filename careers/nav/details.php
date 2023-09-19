<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    $pid = $_POST['pid'];
    $posSQl = "SELECT * FROM position WHERE pid = '$pid' ";
    $posResult= $conn->query($posSQl);
    $benSQL = "SELECT benefit FROM benefits WHERE pid = '$pid' ";
    $benResult = $conn->query($benSQL);
    $reqSQL = "SELECT requirment FROM requirments WHERE pid = '$pid' ";
    $reqResult = $conn->query($reqSQL);
    $qualSQL = "SELECT qualification FROM qualifications WHERE pid = '$pid' ";
    $qualResult = $conn->query($qualSQL);
    $sSQL= "SELECT skill FROM skills WHERE pid = '$pid' ";
    $sResult = $conn->query($sSQL);
    $rSQL= "SELECT responsibility FROM responsibilities WHERE pid = '$pid' ";
    $rResult = $conn->query($rSQL);
    $tSQL= "SELECT travel FROM travel WHERE pid = '$pid' ";
    $tResult = $conn->query($tSQL);
    $cSQL= "SELECT clearance FROM clearance WHERE pid = '$pid' ";
    $cResult = $conn->query($cSQL);
    $pSQL= "SELECT phys_req FROM phys WHERE pid = '$pid' ";
    $pResult = $conn->query($pSQL);
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/careers/nav/nav.css">
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
                <form class="apply" action="http://localhost:3000/careers/app/resume.php" method="post">  
                    <input type="submit" value="Apply Now" class="app">
                    <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>"> 
                </form>
            </div>
        </header><br><br><br>
  
        <div class="container">
            <?php
                if($posResult->num_rows >0){
                    while($row = $posResult->fetch_assoc()){
                        echo "<fieldset class='papp'>";
                        echo "<legend style='font-size:400%;'>".$row['title']."</legend>";
                        echo "<p class='dpid''>Position ID: ". $row['pid']."</p>";
                        echo "<p class='dloc'>". $row['location']." | ".$row['wlocation']." | " .$row['type']." | " .$row['level']. "</p><br><br>";
                        echo "<p class='dsched'>". $row['sday']." - ". $row['eday']." ".$row['sshift']." - ". $row['eshift']. "</p><br>";
                        echo "<p class='dsal'>Salary: $". $row['min']."/hr - $".$row['max']."/hr</p><br>";
                        echo "<p class='ddesc'>Description: ".$row['description']."</p>";
                    }                        
                    echo "<div class='details'>";
                    echo "<p class='ben'>Benfits:</p><ul class='blist'>";
                    if($benResult->num_rows >0){
                        while($row = $benResult->fetch_assoc()){
                           echo "<li>".$row['benefit']."</li>";                   
                        }
                    }echo "</ul>";

                    echo "<p class='req'>Min. Requirements:</p><ul class='reqlist'>";
                    if($reqResult->num_rows >0){
                        while($row = $reqResult->fetch_assoc()){
                        echo "<li>".$row['requirment']."</li>";                   
                        }
                    }echo "</ul>";

                    echo "<p class='qual'>Qualifications:</p><ul class='quallist'>";
                    if($qualResult->num_rows >0){
                        while($row = $qualResult->fetch_assoc()){
                           echo "<li>".$row['qualification']."</li>";                   
                        }
                    }echo "</ul>";

                    echo "<p class='skills'>Skills:</p><ul class='slist'>";
                    if($sResult->num_rows >0){
                        while($row = $sResult->fetch_assoc()){
                           echo "<li>".$row['skill']."</li>";                   
                        }
                    }echo "</ul>";

                    echo "<p class='resp'>Responsibilities:</p><ul class='resplist'>";
                    if($rResult->num_rows >0){
                        while($row = $rResult->fetch_assoc()){
                           echo "<li>".$row['responsibility']."</li>";                   
                        }
                    }echo "</ul>";  

                    echo "<p class='travel'>Travel Requirements:</p><ul class='tlist'>";
                    if($tResult->num_rows >0){
                        while($row = $tResult->fetch_assoc()){
                           echo "<li>".$row['travel']."</li>";                   
                        }
                    }echo "</ul>";   
    
                    echo "<p class='clear'>Clearance:</p><ul class='clist'>";
                    if($cResult->num_rows >0){
                        while($row = $cResult->fetch_assoc()){
                           echo "<li>".$row['clearance']."</li>";                   
                        }
                    }echo "</ul>";   
                    
                    echo "<p class='phys'>Physical Requirements:</p><ul class='physlist'>";
                    if($pResult->num_rows >0){
                        while($row = $pResult->fetch_assoc()){
                           echo "<li>".$row['phys_req']."</li>";                   
                        }
                    }echo "</ul>";  
                }
            ?>
            </div>
        </div>
    </body>
    <div class="block" style="position:relative; margin-top: 70%;">
        <footer>
            <p>Designed and Developed By: Mark Anthony Castillo</p>
            <p>Applicant Tracking System (Version: Beta)</p>
        </footer>
    </div>
</html>
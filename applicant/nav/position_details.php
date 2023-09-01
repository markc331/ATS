<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';

    session_start();
    $hrid = $_SESSION['hrid'];

    $userSQL = "SELECT fname FROM rep WHERE hrid = '$hrid'";
    $userResult = $conn->query($userSQL);

    while($row = $userResult->fetch_assoc()){
        $name = $row['fname'];
    }
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
        <link rel="stylesheet" href="/hr/nav/css/home.css">
        <link rel="stylesheet" href="/hr/position/css/position.css">
        <title>Athios</title>
    </head>

    <body> 
        <header>
            <div class="nav_container">
                <img src="/athios_logo.jpg" alt="logo" class="logo">
            </div>
        </header><br><br><br>

        
        <form action="http://localhost:3000/applicant/nav/home.php" method="post" style="float:left;">
            <input type="submit" value="Return to Home" class="prev">
        </form><br><br>

        <form action="http://localhost:3000/applicant/application/app.php" method="post" class="apply">
            <input type="hidden" id="pid" name="pid" value="<?php echo $pid ?>">
            <input class="apply" type="submit" value="Apply">
        </form>
        <div class="container">

            <?php
                if($posResult->num_rows >0){
                    while($row = $posResult->fetch_assoc()){
                        echo "<fieldset class='papp'>";
                        echo "<legend style='font-size:250%;'>".$row['title']."</legend>";
                        echo "<div id='pid' style='text-align:right;'>Position ID: ". $row['pid']."</div><br>";
                        echo "<div id='details' style='text-align:left;margin-left: 5%;'>";
                        echo "Type: ". $row['type']."<br>";
                        echo "Level: ". $row['level']."<br>";
                        echo "Work Location: ". $row['wlocation']."<br>";
                        echo "Location: ". $row['location']."<br>";
                        echo "Salary: $". $row['min']." - $".$row['max']."<br>";
                        echo "Shifts: ". $row['sday']." - ". $row['eday']." ".$row['sshift']." - ". $row['eshift']. "<br>";
                        echo "Date Posted: ". $row['date']." ". $row['time']. "<br>";
                    }
                }else{
                    echo "No Positions";
                }
                echo "<br>Benefits: <ul>";
                if($benResult->num_rows >0){
                    while($row = $benResult->fetch_assoc()){
                       echo "<li>".$row['benefit']."</li>";                   
                    }
                }echo "</ul>";

                echo "<br>Min. Requirements: <ul>";
                if($reqResult->num_rows >0){
                    while($row = $reqResult->fetch_assoc()){
                       echo "<li>".$row['requirment']."</li>";                   
                    }
                }else{
                    echo "No Positions";
                }
                echo "</ul>";

                echo "<br>Qualifications: <ul>";
                if($qualResult->num_rows >0){
                    while($row = $qualResult->fetch_assoc()){
                       echo "<li>".$row['qualification']."</li>";                   
                    }
                }else{
                    echo "No Positions";
                }
                echo "</ul>";
                
                echo "<br>Skills: <ul>";
                if($sResult->num_rows >0){
                    while($row = $sResult->fetch_assoc()){
                       echo "<li>".$row['skill']."</li>";                   
                    }
                }else{
                    echo "No Positions";
                }
                echo "</ul>";

                echo "<br>Responsibilities: <ul>";
                if($rResult->num_rows >0){
                    while($row = $rResult->fetch_assoc()){
                       echo "<li>".$row['responsibility']."</li>";                   
                    }
                }else{
                    echo "No Positions";
                }
                echo "</ul>";   
                
                echo "<br>Travel Requirements: <ul>";
                if($tResult->num_rows >0){
                    while($row = $tResult->fetch_assoc()){
                       echo "<li>".$row['travel']."</li>";                   
                    }
                }else{
                    echo "No Positions";
                }
                echo "</ul>";   

                echo "<br>Clearance: <ul>";
                if($cResult->num_rows >0){
                    while($row = $cResult->fetch_assoc()){
                       echo "<li>".$row['clearance']."</li>";                   
                    }
                }else{
                    echo "No Positions";
                }
                echo "</ul>";   
                
                echo "<br>Physical Requirements: <ul>";
                if($pResult->num_rows >0){
                    while($row = $pResult->fetch_assoc()){
                       echo "<li>".$row['phys_req']."</li>";                   
                    }
                }else{
                    echo "No Positions";
                }
                echo "</ul>";   
            ?>
        </div>
    </body>
</html>
<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';

   session_start();

   $uid = $_SESSION['uid'];

   $sql = "SELECT * FROM applicant where uid ='$uid' ";
            
   $result = $conn->query($sql);

   if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
            echo "Application ID: ".$row['aid']."<br>";
            echo "Position ID: ".$row['pid'];
    }
}else{
    echo "No Positions";
}

?>
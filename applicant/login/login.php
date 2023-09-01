<?php 
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    include '/Users/mac/Documents/ATS/applicant/login/login.html';

    $user = $_POST['user_name'];
    $password = $_POST['pswrd'];

    $sql = "SELECT uid FROM user WHERE uname = '$user' AND password = '$password' ";

    $result = $conn->query($sql);
    
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Athios</title>
    </head>

    <body> 
        <div class="container">
            <?php
                if($result->num_rows != 1){
                    echo "Incorrect Username or Password";
                }   
                else{ 
                    $row= $result->fetch_assoc();
                    session_start();
                    $_SESSION['uid'] = $row['uid'];
                    header('Location: http://localhost:3000/applicant/nav/home.php');
                    exit();
                }
            ?>
        </div>    
    </body>
</html>
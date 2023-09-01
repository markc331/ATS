<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';

    $uname = $_POST['uname'];
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pswrd'];


    $sql = "INSERT INTO user (uname, fname, lname, email, password)
            VALUES('$uname', '$first', '$last', '$email', '$password')";

    $conn->execute_query($sql);
    
    header('Location: http://localhost:3000/applicant/login/login.html');
    exit();
?>
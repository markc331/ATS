<?php
    include '/Users/mac/Documents/ATS/hr/php/db_connect.php';

    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pswrd'];


    $sql = "INSERT INTO rep (fname, lname, email, password)
            VALUES('$first', '$last', '$email', '$password')";

    $conn->execute_query($sql);
    
    header('Location: http://localhost:3000/hr/php/home.php');
    exit();
?>
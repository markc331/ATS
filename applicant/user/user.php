<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';

   session_start();

   $uid = $_SESSION['uid'];

   echo $uid;

?>
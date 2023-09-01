<?php
    session_start();

    unset($_SESSION['hrid']);

    header('Location: http://localhost:3000/hr/login/login.html');
    exit();
?>
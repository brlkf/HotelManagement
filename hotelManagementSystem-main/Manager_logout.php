<?php
    session_start();
    session_destroy();
    echo "<script>alert('Logout Successful!');</script>";
    echo "<script>window.location.href='recep-login.php';</script>";
?>

<?php
    session_start();
    session_destroy();
    echo "Đăng xuất thành công!";
    header("refresh: 2;url = ../login.php");
?>
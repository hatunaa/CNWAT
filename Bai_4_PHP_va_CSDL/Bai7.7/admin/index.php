<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if ($_SESSION['username'] != 'admin' && $_SESSION['password'] !== 'admin') {
        echo 'Vui lòng đăng nhập với tài khoản quản trị viên!';
        header("refresh:2; url=../index.php");
        die();
    }
} else {
    echo 'Vui lòng đăng nhập!';
    header("refresh:2; url=../index.php");
    die();
}
$pageCenter = './adminHome.php';
if (isset($_POST['Logout'])) {
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    echo 'Đã đăng xuất';
    header("refresh:2; url=../index.php");
    die();
}
if (isset($_POST['Upload'])) {
    $pageCenter = './listUpload.php';
}

if (isset($_POST['submitUpload'])) {
    $pageCenter = './upload.php';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/center.css">
    <link rel="stylesheet" href="../css/head.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/left.css">
    <link rel="stylesheet" href="../css/contact1Page.css">
</head>

<body>
    <div class="container-app">
        <div class="header-container">
            <img class="img-header" src="../images/header.png" alt="">
        </div>
        <div class="content">
            <div class="buttonNav" style="background-color: aliceblue;width: 200px;height: 100%; text-align: center;/*! margin: 20px; */padding: 25px 0px;">
                <!-- <img class="img-left" src="../images/discord.png" alt="">
                <img class="img-left" src="../images/flower.jpg" alt=""> -->
                <form method="POST" action="../index.php">
                    <input type="submit" value="Return Home" name="page" style="width: 80%;">
                </form>
                <form method="POST" action="./index.php">
                    <input type="submit" value="Admin Home" name="AdminHome" style="width: 80%;">
                </form>
                <form method="POST" action="./index.php">
                    <input type="submit" value="Logout" name="Logout" style="width: 80%;">
                </form>
                <form method="POST" action="./index.php">
                    <input type="submit" value="Upload file" name="Upload" style="width: 80%;">
                </form>
            </div>
            <div class="content-right">
                <?php
                include $pageCenter;
                ?>
            </div>
        </div>
        <div class="header-container">
            <img class="img-footer" src="../images/footer.png" alt="">
        </div>
    </div>
</body>

</html>
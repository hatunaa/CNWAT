<?php
require_once './pages/define.php';
session_start();
if (isset($_COOKIE['lang'])) {
    if (isset($_POST['lang'])) {
        if ($_COOKIE['lang'] == 0) {
            setcookie('lang', 1);
            header("location: . ");
        } else {
            setcookie('lang', 0);
            header("location: . ");
        }
    }
} else {
    setcookie('lang', 0);
    header("location: . ");
}

$pageCenter = './pages/introduction.php';
if (!empty(isset($_POST['contact']))) {
    $pageCenter = './pages/contact.php';
}

if (!empty(isset($_POST['submitForm']))) {
    $pageCenter = './pages/resultSubmit.php';
}

if (!empty(isset($_POST['Contact1Page'])) || !empty(isset($_POST['SubmitFormContact']))) {
    $pageCenter = './pages/introduction.php';
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
    <link rel="stylesheet" href="./css/head.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/center.css">
    <link rel="stylesheet" href="./css/contact1Page.css">
</head>

<body>
    <div class="container-app">
        <?php include './pages/head.php'; ?>
        <div class="content">
            <?php include './pages/left.php'; ?>
            <div class="content-right">
                <?php
                include $pageCenter;
                ?>
            </div>
        </div>
        <?php include './pages/footer.php'; ?>
    </div>
</body>

</html>
<?php
$pageCenter = './pages/contact.php';
if (isset($_POST['list'])) {
    $pageCenter = './pages/listLop.php';
}
if (isset($_POST['addLop'])) {
    $pageCenter = './pages/addLopForm.php';
}

if (isset($_POST['list2'])) {
    // header("location: ./pages/HoSo/listHoSo.php");
    $pageCenter = './pages/HoSo/listHoSo.php';
}

if (isset($_POST['addHoSo'])) {
    header("location: ./pages/HoSo/addHoSo.php");
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
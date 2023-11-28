<?php
$pageCenter = './pages/contact.php';
if (!empty($_POST["Arr1Chieu"]) || isset($_POST['calculate_total_oda']) || isset($_POST['reset_total_oda'])) {
    $pageCenter = './pages/arr1Chieu.php';
}

if (isset($_POST["Matrix"]) || isset($_POST["calculate_matrix"]) || isset($_POST["reset_matrix"])) {
    $pageCenter = './pages/matrix.php';
}

if (isset($_POST["AssociateArr"])) {
    $pageCenter = './pages/associateArr.php';
}

if (isset($_POST["submitUpload"])) {
    $pageCenter = './pages/upload.php';
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
    <link rel="stylesheet" href="./css/drawTable.css">
    <link rel="stylesheet" href="./css/calculate.css">
    <link rel="stylesheet" href="./css/center.css">
    <link rel="stylesheet" href="./css/register.css">
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
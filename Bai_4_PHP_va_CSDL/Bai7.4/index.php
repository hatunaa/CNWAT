<?php
$pageCenter = './pages/contact.php';
if (isset($_POST['page'])) {
    $page = strtolower($_POST['page']);

    switch ($page) {
        case 'calculation':
            $pageCenter =  './pages/' . $page . '.php';
            break;
        case 'submitcalculate':
            $pageCenter = './pages/calculation.php';
            break;
        case 'form':
            $pageCenter = './pages/' . $page . '.php';
            break;
        default:
            break;
    }
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
                // var_dump($_REQUEST);
                // die();
                ?>
            </div>
        </div>
        <?php include './pages/footer.php'; ?>
    </div>
</body>

</html>
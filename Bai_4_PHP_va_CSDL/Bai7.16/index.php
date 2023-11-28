<?php

session_start();

if (!isset($_SESSION['login'])) {
    echo 'Vui lòng đăng nhập!';
    header("refresh: 2; url=login.php");
    die();
}

$pageCenter = './pages/contact.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'userList':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'userAdd':
            $pageCenter =  './pages/' . $page . '.php';
            break;
        case 'userEdit':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'userDetail':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'categoriesList':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'categoriesAdd':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'categoriesEdit':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'categoriesDetail':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'productList':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'productAdd':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'productEdit':
            $pageCenter = './pages/' . $page . '.php';
            break;
        case 'productDetail':
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
    <link rel="stylesheet" href="./css/center.css">
    <link rel="stylesheet" href="./css/register.css">
</head>

<body>
    <div class="container-app">
        <?php include './pages/head.php'; ?>
        <div class="content">
            <?php include './pages/left.php'; ?>

            <div class="content-right m-2">
                <?php include $pageCenter; ?>
            </div>
        </div>
        <?php include './pages/footer.php'; ?>
    </div>
</body>

</html>
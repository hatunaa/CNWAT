<?php
require_once 'pages/connect.php';
if (!isset($_GET['id'])) {
    echo 'Làm gì có id mà xem chi tiết';
    header("Refresh: 2; url=./index.php");
    die();
}
$query = "SELECT * FROM products WHERE id = ?";
$result = $conn->prepare($query);
$result->bind_param("i", $_GET['id']);
$result->execute();
$result = $result->get_result()->fetch_all()[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="m-5">
        <h3>Thông tin chi tiết sản phẩm: </h3>
        <div class="mt-4">
            <div class="row">
                <div class="col-lg-3">
                    <img style="width: 350px;" src="<?php echo $result[4]; ?>" alt="Ảnh user">
                </div>
                <div class="col-lg-9">
                    <p>Product name: <?php echo $result[1]; ?></p>
                    <p>Product description: <?php echo $result[2]; ?></p>
                    <p>Product Price: <?php echo number_format($result[3], 0, '.', '.'); ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
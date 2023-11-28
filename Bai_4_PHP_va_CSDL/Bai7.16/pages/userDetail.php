<?php
require_once 'pages/connect.php';
if (!isset($_GET['id'])) {
    echo 'Làm gì có id mà xem chi tiết';
    header("Refresh: 2; url=./index.php");
    die();
}
$query = "SELECT * FROM users WHERE id = ?";
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
        <h3>Thông tin chi tiết người dùng: </h3>
        <div class="mt-4">
            <div class="row">
                <div class="col-lg-3">
                    <img src="<?php echo $result[6]; ?>" alt="Ảnh user">
                </div>
                <div class="col-lg-9">
                    <p>Fullname: <?php echo $result[3]; ?></p>
                    <p>Birthday: <?php echo $result[4]; ?></p>
                    <p>Address: <?php echo $result[5]; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['addProduct'])) {
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    if (empty($productname) || empty($description) || empty($price) || empty($type)) {
        echo 'Nhập các trường cho nó đầy đủ vào';
        header("Refresh: 2; url=../index.php?page=productAdd");
        die();
    }

    require_once 'connect.php';

    $query = "SELECT productName FROM products;";
    $result = $conn->execute_query($query)->fetch_all();


    for ($i = 0; $i < count($result); $i++) {
        if ($productname === strtolower($result[$i][0])) {
            echo 'productname đã tồn tại';
            header("Refresh: 2; url=../index.php?page=productAdd");
            die();
        }
    }


    $name_avatar = 'default.jpg';
    if ($_FILES['avatar']['size'] > 0) {
        $avatar = $_FILES['avatar'];
        $name_avatar = $avatar['name'];
        $path = '../productImg/' . $name_avatar;
        move_uploaded_file($avatar['tmp_name'], $path);
    }
    $path = './productImg/' . $name_avatar;

    try {
        $query = "INSERT INTO products(productName,productDesc,productPrice,productImg,productType) VALUES(?,?,?,?,?)";
        $result = $conn->prepare($query);
        $result->bind_param("ssiss", $productname, $description, $price, $path, $type);
        $result->execute();
        echo 'Thêm thành công';
        header("Refresh: 2; url=../index.php?page=userList");
        die();
    } catch (\Throwable $th) {
        echo 'Có lỗi ' . $th;
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/userAdd.css">

</head>

<body>
    <div class="m-5">
        <h3>Thêm sản phẩm mới</h3>
        <div class="mt-4">
            <form action="pages/productAdd.php" method="post" enctype="multipart/form-data">

                <div class="m-3">
                    <label for="productname">Product name:</label>
                    <input type="text" id="username" name="productname" required>
                </div>

                <div class="m-3">
                    <label for="description">Product description:</label>
                    <textarea style="width: 100%;" type="text" id="description" name="description"></textarea>
                </div>

                <div class="m-3">
                    <label for="price">Product price:</label>
                    <input type="text" id="price" name="price">
                </div>

                <div class="m-3">
                    <label for="type">Product type:</label>
                    <input type="text" id="type" name="type">
                </div>

                <div class="m-3">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="avatar">
                </div>

                <div class="m-3">
                    <button type="reset">Reset</button>
                    <button type="submit" name="addProduct">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
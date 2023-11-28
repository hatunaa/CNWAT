<?php
require_once 'connect.php';
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

// var_dump($result);
// die();
if (isset($_POST['editProduct'])) {
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    if (empty($productname) || empty($description) || empty($price) || empty($type)) {
        echo 'Nhập các trường cho nó đầy đủ vào';
        header("Refresh: 2; url=../index.php?page=productAdd");
        die();
    }

    $query = "SELECT productName FROM products WHERE productName!=?;";

    $result = $conn->prepare($query);
    $result->bind_param("s", $_POST['productname']);
    $result->execute();
    $result = $result->get_result()->fetch_all();


    for ($i = 0; $i < count($result); $i++) {
        if ($name === strtolower($result[$i][0])) {
            echo 'productname đã tồn tại ';
            header("Refresh: 2; url=../index.php?page=productList");
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
        $query = "UPDATE products SET productName=?,productDesc=?,productPrice=?,productImg=?,productType=? WHERE id=?";
        $result = $conn->prepare($query);
        $result->bind_param("ssissi", $productname, $description, $price, $path, $type, $_GET['id']);
        $result->execute();
        echo 'Sửa thành công';
        header("Refresh: 2; url=../index.php?page=productList");
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
        <h3>Sửa thông tin user:</h3>
        <div class="mt-4">
            <form action="pages/productEdit.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                <div class="m-3">
                    <label for="productname">Product name:</label>
                    <input type="text" id="username" name="productname" value="<?php echo $result[1]; ?>" required>
                </div>

                <div class="m-3">
                    <label for="description">Product description:</label>
                    <textarea style="width: 100%;" type="text" id="description" name="description" required><?php echo $result[2]; ?></textarea>
                </div>

                <div class="m-3">
                    <label for="price">Product price:</label>
                    <input type="text" id="price" name="fulpricelname" value="<?php echo $result[3]; ?>" required>
                </div>

                <div class="m-3">
                    <label for="type">Product type:</label>
                    <input type="text" id="birthday" name="birthday" value="<?php echo $result[5]; ?>">
                </div>

                <div class="m-3">
                    <label for="image">Image: (Ảnh cũ)</label>
                    <img style="margin-right: 100px;" src="<?php echo $result[4]; ?>" alt="Ảnh cũ">

                    <label class="ml-5" for="image">(Upload ảnh mới)</label>
                    <input type="file" id="image" name="avatar" value="Browse">
                </div>

                <div class="m-3">
                    <button type="reset">Reset</button>
                    <button type="submit" name="editProduct">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
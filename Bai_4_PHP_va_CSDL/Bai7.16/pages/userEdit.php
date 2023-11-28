<?php
require_once 'connect.php';
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


if (isset($_POST['editUser'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];

    if (empty($name) || empty($password) || empty($birthday) || empty($address) || empty($fullname)) {
        echo 'Nhập các trường cho nó đầy đủ vào';
        header("Refresh: 2; url=../index.php?page=userAdd");
        die();
    }

    // require_once 'connect.php';

    $query = "SELECT username FROM users WHERE username!=?;";

    $result = $conn->prepare($query);
    $result->bind_param("s", $_POST['username']);
    $result->execute();
    $result = $result->get_result()->fetch_all();


    for ($i = 0; $i < count($result); $i++) {
        if ($name === strtolower($result[$i][0])) {
            echo 'username đã tồn tại với password là hihihi';
            header("Refresh: 2; url=../index.php?page=userList");
            die();
        }
    }
    $name_avatar = 'default.png';
    if ($_FILES['avatar']['size'] > 0) {
        $avatar = $_FILES['avatar'];
        $name_avatar = $name . '_' . $avatar['name'];
        $path = '../avatar/' . $name_avatar;
        move_uploaded_file($avatar['tmp_name'], $path);
    }
    $path = './avatar/' . $name_avatar;

    try {
        $query = "UPDATE users SET username=?,password=?,fullname=?,birthday=?,address=?,avt=? WHERE id=?";
        $result = $conn->prepare($query);
        $birthday = date('Ymd', strtotime($birthday));
        $result->bind_param("sssdssi", $name, $password, $fullname, $birthday, $address, $path, $_GET['id']);
        $result->execute();
        echo 'Sửa thành công';
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
        <h3>Sửa thông tin user:</h3>
        <div class="mt-4">
            <form action="pages/userEdit.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                <div class="m-3">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $result[1]; ?>" required>
                </div>

                <div class="m-3">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php echo $result[2]; ?>" required>
                </div>

                <div class="m-3">
                    <label for="fullname">Fullname:</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $result[3]; ?>" required>
                </div>

                <div class="m-3">
                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday" value="<?php echo $result[4]; ?>">
                </div>

                <div class="m-3">
                    <label for="address">Address:</label>
                    <input id="address" name="address" value="<?php echo $result[5]; ?>">
                </div>

                <div class="m-3">
                    <label for="image">Image: (Ảnh cũ)</label>
                    <img style="margin-right: 100px;" src="<?php echo $result[6]; ?>" alt="Ảnh cũ">

                    <label class="ml-5" for="image">(Upload ảnh mới)</label>
                    <input type="file" id="image" name="avatar" value="Browse">
                </div>

                <div class="m-3">
                    <button type="reset">Reset</button>
                    <button type="submit" name="editUser">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
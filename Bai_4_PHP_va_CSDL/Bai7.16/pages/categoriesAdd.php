<?php
if (isset($_POST['addUser'])) {
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

    require_once 'connect.php';

    $query = "SELECT username FROM users;";
    $result = $conn->execute_query($query)->fetch_all();


    for ($i = 0; $i < count($result); $i++) {
        if ($name === strtolower($result[$i][0])) {
            echo 'username đã tồn tại với password là hihihi';
            header("Refresh: 2; url=../index.php?page=userAdd");
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
        $query = "INSERT INTO users(username,password,fullname,birthday,address,avt) VALUES(?,?,?,?,?,?)";
        $result = $conn->prepare($query);
        $birthday = date('Ymd', strtotime($birthday));
        $result->bind_param("sssdss", $name, $password, $fullname, $birthday, $address, $path);
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
        <h3>Thêm người dùng mới</h3>
        <div class="mt-4">
            <form action="pages/userAdd.php" method="post" enctype="multipart/form-data">
                <div class="m-3">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="m-3">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="m-3">
                    <label for="fullname">Fullname:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>

                <div class="m-3">
                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday">
                </div>

                <div class="m-3">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address"></textarea>
                </div>

                <div class="m-3">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="avatar">
                </div>

                <div class="m-3">
                    <button type="reset">Reset</button>
                    <button type="submit" name="addUser">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
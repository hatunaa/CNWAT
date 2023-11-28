<?php
require_once '../connect.php';

$query = "SELECT * FROM HoSo WHERE MaHS = ?";
$result = $conn->prepare($query);
$result->bind_param('s', $_GET['id']);
$result->execute();
// var_dump($result->get_result());
$result = $result->get_result()->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa hồ sơ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Chỉnh sửa hồ sơ</h1>
    <form action="../update.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <label for="MAHS">Mã học sinh:</label>
        <?php
        if (isset($result['MAHS'])) {
            echo '<input type="text" id="MAHS" name="MAHS" placeholder="Enter your name" value="' . $result['MAHS'] . '"><br><br>';
        } else {
            echo '<input type="text" id="MAHS" name="MAHS" placeholder="Nhập mã sinh viên"><br><br>';
        }
        ?>
        <label for="name">Name:</label>
        <?php
        if (isset($result['HoTen'])) {
            echo '<input type="text" id="name" name="name" placeholder="Enter your name" value="' . $result['HoTen'] . '"><br><br>';
        } else {
            echo '<input type="text" id="name" name="name" placeholder="Enter your name"><br><br>';
        }
        ?>

        <label for="name">Ngày sinh:</label>
        <?php
        if (isset($result['NgaySinh'])) {
            echo '<input type="date" id="birthday" name="birthday" placeholder="Chọn ngày sinh" value="' . $result['NgaySinh'] . '"><br><br>';
        } else {
            echo '<input type="date" id="birthday" name="birthday" placeholder="Chọn ngày sinh"><br><br>';
        }
        ?>

        <label for="name">Địa chỉ:</label>
        <?php
        if (isset($result['DiaChi'])) {
            echo '<input type="text" id="address" name="address" placeholder="Nhập địa chỉ" value="' . $result['DiaChi'] . '"><br><br>';
        } else {
            echo '<input type="text" id="address" name="address" placeholder="Nhập địa chỉ"><br><br>';
        }
        ?>

        <label for="name">Lớp:</label>
        <?php
        if (isset($result['Lop'])) {
            echo '<input type="text" id="class" name="class" placeholder="Nhập lớp" value="' . $result['Lop'] . '"><br><br>';
        } else {
            echo '<input type="text" id="class" name="class" placeholder="Nhập lớp"><br><br>';
        }
        ?>

        <label for="name">Điểm Toán:</label>
        <?php
        if (isset($result['DiemToan'])) {
            echo '<input type="text" id="math" name="math" placeholder="Nhập điểm Toán" value="' . $result['DiemToan'] . '"><br><br>';
        } else {
            echo '<input type="text" id="math" name="math" placeholder="Nhập điểm Toán"><br><br>';
        }
        ?>

        <label for="name">Điểm Lý:</label>
        <?php
        if (isset($result['DiemLy'])) {
            echo '<input type="text" id="physical" name="physical" placeholder="Nhập điểm Lý" value="' . $result['DiemLy'] . '"><br><br>';
        } else {
            echo '<input type="text" id="physical" name="physical" placeholder="Nhập điểm Lý"><br><br>';
        }
        ?>

        <label for="name">Điểm Hóa:</label>
        <?php
        if (isset($result['DiemHoa'])) {
            echo '<input type="text" id="science" name="science" placeholder="Nhập điểm Hóa" value="' . $result['DiemHoa'] . '"><br><br>';
        } else {
            echo '<input type="text" id="science" name="science" placeholder="Nhập điểm Hóa"><br><br>';
        }
        ?>
        <!-- <input type="text" id="name" name="name" placeholder="Enter your name"><br><br> -->

        <!-- <input type="tel" id="phone" name="phone" placeholder="Enter your phone number"><br><br> -->

        <input type="submit" name="Back" value="Back">
        <input type="submit" name="updateHoSo" value="Save">

    </form>
</body>

</html>
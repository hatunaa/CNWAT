<?php
require_once 'connect.php';

$query = "SELECT * FROM LOP WHERE MaLop = ?";
$result = $conn->prepare($query);
$result->bind_param('s', $_GET['id']);
$result->execute();
$result = $result->get_result()->fetch_array(MYSQLI_ASSOC);
if (!$result) {
    echo 'Chưa tồn tại khóa học này';
    header("Refresh: 2; url=../../index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Name and Phone Number</title>
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
        input[type="tel"] {
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
    <h1>Edit Class</h1>
    <form action="../updateLop.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label for="name">Mã Lớp:</label>
        <?php
        if (isset($result['MaLop'])) {
            echo '<input type="text" id="name" name="MaLop" placeholder="Enter your class\' id" value="' . $result['MaLop'] . '"><br><br>';
        } else {
            echo '<input type="text" id="name" name="MaLop" placeholder="Enter your class\' id"><br><br>';
        }
        ?>
        <label for="name">Tên lớp</label>
        <?php
        if (isset($result['TenLop'])) {
            echo '<input type="text" id="name" name="TenLop" placeholder="Enter your class\' name" value="' . $result['MaLop'] . '"><br><br>';
        } else {
            echo '<input type="text" id="name" name="TenLop" placeholder="Enter your class\' name"><br><br>';
        }
        ?>

        <label for="name">Khóa học</label>
        <?php
        if (isset($result['KhoaHoc'])) {
            echo '<input type="text" id="name" name="KhoaHoc" placeholder="Enter your class\' name" value="' . $result['KhoaHoc'] . '"><br><br>';
        } else {
            echo '<input type="text" id="name" name="KhoaHoc" placeholder="Enter your class\' name"><br><br>';
        }
        ?>
        <!-- <input type="text" id="name" name="name" placeholder="Enter your name"><br><br> -->

        <label for="phone">Giáo viên chủ nhiệm:</label>
        <?php
        if (isset($result['GVCN'])) {
            echo '<input type="tel" id="phone" name="GVCN" placeholder="Enter your phone number" value="' . $result['GVCN'] . '"><br><br>';
        } else {
            echo '<input type="tel" id="phone" name="GVCN" placeholder="Enter your phone number"><br><br>';
        }
        ?>
        <!-- <input type="tel" id="phone" name="phone" placeholder="Enter your phone number"><br><br> -->

        <input type="submit" name="updateLop" value="Save">
    </form>
</body>

</html>
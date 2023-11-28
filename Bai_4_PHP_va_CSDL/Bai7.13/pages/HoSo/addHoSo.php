<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hồ sơ</title>
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
        input[type="tel"],
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
    <h1>Thêm hồ sơ</h1>
    <form action="./add.php" method="POST">
        <label for="maSV">Mã sinh viên:</label>
        <input type="text" id="maSV" name="maSV" placeholder="Nhập mã sinh viên"><br><br>
        <label for="name">Họ tên:</label>
        <input type="text" id="name" name="name" placeholder="Nhập tên"><br><br>
        <label for="birthday">Ngày sinh:</label>
        <input type="date" id="birthday" name="birthday" placeholder="Chọn ngày sinh"><br><br>
        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" placeholder="Nhập địa chỉ"><br><br>
        <label for="class">Lớp:</label>
        <input type="text" id="class" name="class" placeholder="Nhập lớp"><br><br>
        <label for="math">Điểm Toán:</label>
        <input type="text" id="math" name="math" placeholder="Nhập điểm Toán"><br><br>
        <label for="physical">Điểm Lý:</label>
        <input type="text" id="physical" name="physical" placeholder="Nhập điểm Lý"><br><br>
        <label for="science">Điểm Hóa:</label>
        <input type="text" id="science" name="science" placeholder="Nhập điểm Hóa"><br><br>
        <input type="submit" name="Back" value="Back">
        <input type="submit" name="addUser" value="Save">
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Name and Phone Number</title>
    <style>
        .addLopForm {
            font-family: Arial, sans-serif;
            margin: 10px;
            width: 200%;
            padding: 0;

        }

        .addLopForm h1 {
            text-align: center;
            margin: 20px 0;
        }

        .addLopForm form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .addLopForm label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .addLopForm input[type="text"],
        .addLopForm input[type="tel"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        .addLopForm input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }

        .addLopForm input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<div class="addLopForm">
    <h1>Add Class</h1>
    <form action="./pages/addLop.php" method="POST">
        <label for="name">Ma Lop:</label>
        <input type="text" id="name" name="MaLop" placeholder="Enter your class's id"><br><br>

        <label for="name">Ten Lop:</label>
        <input type="text" id="name" name="TenLop" placeholder="Enter your class's name"><br><br>

        <label for="name">Khoa Hoc:</label>
        <input type="text" id="name" name="KhoaHoc" placeholder="Enter your course"><br><br>

        <label for="phone">Giáo viên chủ nhiệm:</label>
        <input type="tel" id="phone" name="GVCN" placeholder="Enter your teacher's name"><br><br>

        <input type="submit" name="addUser" value="Save">
    </form>
</div>

</html>
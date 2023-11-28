<?php
if (isset($_POST['addStudent'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $birthday = $_POST['age'];
    $class = $_POST['class'];
    // $avatar = $_POST['avatar'];

    if (empty($name) || empty($address) || empty($birthday) || empty($class)) {
        echo 'Nhập các trường cho nó đầy đủ vào';
        header("Refresh: 2; url=../index.php");
        die();
    }

    $file = fopen("./students.txt", "r");
    $j = 0;
    $z = 0;
    clearstatcache();
    $listStudent = [];
    if (filesize("./students.txt")) {
        while (!feof($file)) {
            $listStudent[$j][$z] = fgets($file);
            $z++;
            if ($z % 6 === 0) {
                $j++;
                $z = 0;
            }
        }
    }



    $id = count($listStudent) + 1;
    $newStudent[0] = $id;
    $newStudent[1] = $name;
    $newStudent[2] = $birthday;
    $newStudent[3] = $address;
    $newStudent[4] = $class;

    $name_avatar = 'default.png';
    if ($_FILES['avatar']['size'] > 0) {
        $avatar = $_FILES['avatar'];
        $name_avatar = $id . '_' . $avatar['name'];
        $path = '../avatar/' . $name_avatar;
        move_uploaded_file($avatar['tmp_name'], $path);
        $newStudent[5] = './avatar/' . $name_avatar;
    }
    $newStudent[5] = './avatar/' . $name_avatar;

    array_push($listStudent, $newStudent);
    fclose($file);

    $file = fopen("./students.txt", "w");
    // Write to file
    for ($i = 0; $i < count($listStudent); $i++) {
        for ($j = 0; $j < 6; $j++) {
            $listStudent[$i][$j] = str_replace("\n", "", $listStudent[$i][$j]);
            if ($i === count($listStudent) - 1  && $j === 5) {
                fwrite($file,  $listStudent[$i][$j]);
            } else {
                fwrite($file,  $listStudent[$i][$j] . "\n");
            }
        }
    }

    fclose($file);
    echo 'Thêm thành công học sinh: ' . $name;
    header("Refresh: 2; url=../index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm học sinh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .addStudent h1 {
            text-align: center;
            margin: 20px 0;
        }

        .addStudent form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .addStudent label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .addStudent input[type="text"],
        .addStudent input[type="date"],
        .addStudent input[type="file"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        .addStudent input[type="submit"],
        .addStudent input[type="reset"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            font-size: 18px;
            cursor: pointer;
        }

        .addStudent input[type="submit"]:hover,
        .addStudent input[type="reset"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="addStudent">
        <h1>Add Student</h1>
        <form action="./pages/addStudent.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name"><br><br>

            <label for="phone">Ngày sinh:</label>
            <input type="date" id="age" name="age" placeholder="Enter your age"><br><br>

            <label for="phone">Địa chỉ:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address"><br><br>

            <label for="phone">Lớp:</label>
            <input type="text" id="class" name="class" placeholder="Enter your class"><br><br>

            <label for="phone">Avatar:</label>
            <input type="file" id="avatar" name="avatar"><br><br>


            <input type="reset">
            <input type="submit" name="addStudent" value="Save">
        </form>
    </div>

</body>

</html>
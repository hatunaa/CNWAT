<?php
if (isset($_POST['editStudent'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $class = $_POST['class'];
    $id = $_GET['id'];

    if (empty($name) || empty($address) || empty($class)) {
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

    if ($_POST['age'] !== '') {
        $birthday = $_POST['age'];
        $listStudent[$id][2] = $birthday;
    }

    $listStudent[$id][1] = $name;
    $listStudent[$id][3] = $address;
    $listStudent[$id][4] = $class;

    if ($_FILES['avatar']['size'] > 0) {
        unlink($listStudent[$id][5]);
        $avatar = $_FILES['avatar'];
        $name_avatar = $id . '_' . $avatar['name'];
        $path = '../avatar/' . $name_avatar;
        move_uploaded_file($avatar['tmp_name'], $path);
        $listStudent[$id][5] = './avatar/' . $name_avatar;
    }

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
    echo 'Chỉnh sửa học sinh: ' . $name;
    header("Refresh: 2; url=../index.php");
    die();
}

$file = fopen("./pages/students.txt", "r");
$j = 0;
$z = 0;
clearstatcache();
$listStudent = [];
if (filesize("./pages/students.txt")) {
    while (!feof($file)) {
        $listStudent[$j][$z] = fgets($file);
        $z++;
        if ($z % 6 === 0) {
            $j++;
            $z = 0;
        }
    }
}
fclose($file);

$id = $_GET['id'] - 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin học sinh</title>
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
        <h1>Edit Student</h1>
        <form action="./pages/edit.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo $listStudent[$id][1] ?>"><br><br>

            <label for="phone">Ngày sinh:</label>
            <input type="date" id="age" name="age" value="<?php echo $listStudent[$id][2] ?>"><br><br>

            <label for="phone">Địa chỉ:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" value="<?php echo $listStudent[$id][3] ?>"><br><br>

            <label for="phone">Lớp:</label>
            <input type="text" id="class" name="class" placeholder="Enter your class" value="<?php echo $listStudent[$id][4] ?>"><br><br>

            <label for="phone">Avatar:</label>
            <input type="file" id="avatar" name="avatar" value="<?php echo $listStudent[$id][1] ?>"><br><br>


            <input type="reset">
            <input type="submit" name="editStudent" value="Save">
        </form>
    </div>

</body>

</html>
<?php
$file = fopen("./pages/students.txt", "r");
$j = 0;
$z = 0;
clearstatcache();
$listStudent = [];
if (filesize("./pages/students.txt")) {
    try {
        while (!feof($file)) {
            $listStudent[$j][$z] = fgets($file);
            $z++;
            if ($z % 6 === 0) {
                $j++;
                $z = 0;
            }
        }
    } catch (\Throwable $th) {
        //throw $th;
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
    <title>Thông tin Sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        .student-card {
            background-color: #fff;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .student-info {
            text-align: left;
        }

        .student-info h2 {
            font-size: 24px;
        }

        .student-info p {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="student-card">
        <div class="avatar">
            <img src="<?php echo $listStudent[$id][5]; ?>" alt="Avatar của Sinh viên">
        </div>
        <div class="student-info">
            <h2>Tên: <?php echo $listStudent[$id][1]; ?></h2>
            <p>Sinh nhật: <?php
                            // $a = str_replace("\n", "", $listStudent[$id][2]);
                            $a = date_create($listStudent[$id][2]);
                            echo date_format($a,'d-m-Y'); ?></p>
            <p>Quê quán: <?php echo $listStudent[$id][3]; ?></p>
            <p>Lớp: <?php echo $listStudent[$id][4]; ?></p>
        </div>
    </div>
</body>

</html>
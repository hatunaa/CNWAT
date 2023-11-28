<?php
require_once 'libs/connect.php';

$query = "SELECT * FROM classes;";

$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/left.css">
</head>

<body>
    <div style="display: grid;">
        <p style="margin-top: 10px;"><strong>Cách 1</strong></p>
        <?php
        while ($row = mysqli_fetch_row($result)) {
            $maLop = $row[0];
            $tenLop = $row[1];
            echo "<a href='index.php?page=listStudentsInClass&classID=$maLop'>$tenLop</a>";
        }
        ?>

        <p style="margin-top: 10px;"><strong>Cách 2</strong></p>
        <?php
        $result2 = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result2)) {
            $maLop = $row[0];
            $tenLop = $row[1];
            echo "<a href='index.php?page=listStudentsInClass&classID=$maLop'>$tenLop</a>";
        }
        ?>

        <p style="margin-top: 10px;"><strong>Cách 3</strong></p>
        <?php
        $result3 = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result3)) {
            $maLop = $row['ID'];
            $tenLop = $row['ClassName'];
            echo "<a href='index.php?page=listStudentsInClass&classID=$maLop'>$tenLop</a>";
        }
        ?>
    </div>

</body>

</html>
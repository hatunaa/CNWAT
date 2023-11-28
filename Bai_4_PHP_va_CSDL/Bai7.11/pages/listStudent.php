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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
        }

        /* Style the container */
        .container {
            width: 80%;
            /* Adjust the width as needed */
            margin: 0 auto;
            /* Center the container horizontally */
        }

        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Style table header cells */
        th {
            background-color: #e2b2b2;
            /* Gray background */
            text-align: left;
            padding: 8px;
        }

        /* Style table data cells */
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            /* Add a bottom border for separation */
        }

        /* Style alternate rows with a different background color */
        tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Gray background for even rows */
        }

        /* Style the table header text */
        th {
            font-weight: bold;
        }

        /* Center the table header text */
        th,
        td {
            text-align: center;
        }

        .avatar {
            width: 150px;
        }

        .edit {
            padding: 5px 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin: 4px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Ảnh</th>
                <th>Lớp</th>
                <th>Thao tác</th>
            </tr>
            <?php
            for ($i = 0; $i < count($listStudent); $i++) {
                echo '<tr>';
                echo '<td>' . $listStudent[$i][0] . '</td>';
                echo '<td>' . $listStudent[$i][1] . '</td>';
                echo '<td>' . $listStudent[$i][2] . '</td>';
                echo '<td>' . $listStudent[$i][3] . '</td>';
                echo '<td> <img class="avatar" src="' . $listStudent[$i][5] . '"></td>';
                echo '<td>' . $listStudent[$i][4] . '</td>';
                echo '<td><a class="edit" href="./index.php?detail=1&id=' . $listStudent[$i][0] . '">Detail</a>';
                echo '<a class="edit" href="./index.php?edit=1&id=' . $listStudent[$i][0] . '">Edit</a>';
                echo '<a class="edit" href="./index.php?delete=1&id=' . $listStudent[$i][0] . '">Delete</a></td>';
                echo '</tr>';
            }

            ?>
        </table>
        <a href="./index.php?id="></a>
    </div>
</body>

</html>
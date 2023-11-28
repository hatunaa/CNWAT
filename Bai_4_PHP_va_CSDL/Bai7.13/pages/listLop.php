<?php
require_once './pages/connect.php';
$query = "SELECT * FROM LOP;";
$result = $conn->query($query);

// Kiểm tra và xử lý kết quả
if ($result) {
    $listLop = $result->fetch_all();
    // Tiếp tục xử lý dữ liệu
} else {
    // Xử lý lỗi nếu có
    echo "Query failed: " . $conn->error;
}

// Đóng kết nối sau khi sử dụng, nếu cần
$conn->close();
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

        button {
            margin: 0 5px;
            padding: 11px 0px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover a {
            background-color: #0056b3;
            color: white;
        }

        a {

            padding: 11px 29px;
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <tr>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Khóa học</th>
                <th>Giáo viên chủ nhiệm</th>
                <th></th>
            </tr>
            <?php
            for ($i = 0; $i < count($listLop); $i++) {
                echo '<tr>';
                echo '<td>' . $listLop[$i][0] . '</td>';
                echo '<td>' . $listLop[$i][1] . '</td>';
                echo '<td>' . $listLop[$i][2] . '</td>';
                echo '<td>' . $listLop[$i][3] . '</td>';
                echo '<td> <button><a href="./pages/editLop.php/?id=' . $listLop[$i][0] . '">Edit</a></button><button><a href="./pages/deleteLop.php/?id=' . $listLop[$i][0] . '">Xoa</a></button>
                </td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</body>

</html>
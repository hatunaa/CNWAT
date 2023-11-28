<?php
require_once './pages/connect.php';

$query = "SELECT * FROM HoSo ORDER BY MaHS ASC;";
$result = $conn->query($query);

// Kiểm tra và xử lý kết quả
if ($result) {
    $listHoSo = $result->fetch_all();
    // Tiếp tục xử lý dữ liệu
} else {
    // Xử lý lỗi nếu có
    echo "Query failed: " . $conn->error;
}

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
            margin: 10px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            color: #fff;
            padding: 10px 20px;
        }

        .left {
            display: flex;
            align-items: center;
        }

        .right {
            display: flex;
            align-items: center;
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

        button:hover {
            background-color: #0056b3;
        }

        a,
        p,
        span {
            padding: 11px 29px;
            text-decoration: none;
            color: black;
        }

        .pagination-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination-item {
            margin: 0 5px;
        }

        .pagination-link {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .pagination-link.current {
            font-weight: bold;
            background-color: #333;
            color: #fff;
        }

        .pagination-link-first {
            text-decoration: none;
            font-weight: bold;
            color: #333;
        }

        .pagination-link-previous {
            text-decoration: none;
            color: #333;
        }

        .pagination-link {
            text-decoration: none;
            color: #333;
        }

        .pagination-link-next {
            text-decoration: none;
            color: #333;
        }

        .pagination-link-last {
            text-decoration: none;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>
    <!-- <div class="header">
        <div class="left">
            <button>
                <a href="">Danh sách hồ sơ</a>
            </button>
            <button>
                <a id="addUser" href="./addHoSo.php">Thêm hồ sơ</a>
            </button>
        </div>
        <div class="right">
            <button>
                <a id="logOut" href="../../index.php">Home</a>
            </button>
        </div>

    </div> -->
    <div class="container">
        <table>
            <tr>
                <th>Mã sinh viên</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Lớp</th>
                <th>Điểm Toán</th>
                <th>Điểm Lý</th>
                <th>Điểm Hóa</th>
            </tr>
            <?php
            $currentPage = 0;
            $rowsPerPage = 10;
            if (!empty($_GET["currentPage"])) {
                $s = $_GET["currentPage"];
                if (is_numeric($s))
                    $currentPage = intval($s);
            }

            $firstRow = $currentPage * $rowsPerPage;
            $result = $conn->query($query);
            $row = mysqli_fetch_all($result);
            if (count($row) == 0) {
                die();
            }
            for ($i = $firstRow; $i < $rowsPerPage + $firstRow && $i < count($row); $i++) {
                echo '<tr>';
                echo '<td>' . $row[$i][0] . '</td>';
                echo '<td>' . $row[$i][1] . '</td>';
                echo '<td>' . $row[$i][2] . '</td>';
                echo '<td>' . $row[$i][3] . '</td>';
                echo '<td>' . $row[$i][4] . '</td>';
                echo '<td>' . $row[$i][5] . '</td>';
                echo '<td>' . $row[$i][6] . '</td>';
                echo '<td> <button><a href="./delete.php/?id=' . $row[$i][0] . '">Xoa</a></button>
                <button><a href="./edit.php/?id=' . $row[$i][0] . '">Edit</a></button></td>';
                echo '</tr>';
            }
            ?>
        </table>
        <div class="pagination-container">
            <?php
            if ($currentPage == 0) echo "<span class=\"pagination-link-first\">Trang đầu</span>";
            else {
                echo "<a href=\"?currentPage=0\" class=\"pagination-link-first\">Trang đầu</a>";
            }

            if ($currentPage == 0) echo "<span class=\"pagination-link-previous\">Trang trước</span>";
            else {
                echo "<a href=\"?currentPage=" . ($currentPage - 1) . "\" class=\"pagination-link-previous\">Trang trước</a>";
            }

            $numPage = floor(mysqli_num_rows($result) / $rowsPerPage);
            if (mysqli_num_rows($result) % $rowsPerPage != 0)
                $numPage++;
            for ($i = 0; $i < $numPage; $i++)
                if ($i == $currentPage) echo "<span class=\"pagination-link current pagination-item\">" . ($i + 1) . "</span>";
                else {
                    echo "<a class=\"pagination-link pagination-item\" href=\"?currentPage=" . $i . "\">" . ($i + 1) . "</a>";
                }

            $numPage = floor(mysqli_num_rows($result) / $rowsPerPage);
            if (mysqli_num_rows($result) % $rowsPerPage != 0) $numPage++;
            if ($currentPage == $numPage - 1) echo "<span class=\"pagination-link-next\">Trang sau</span>";
            else {
                echo "<a href=\"?currentPage=" . ($currentPage + 1) . "\" class=\"pagination-link-next\">Trang sau</a>";
            }

            $numPage = floor(mysqli_num_rows($result) / $rowsPerPage);
            if (mysqli_num_rows($result) % $rowsPerPage != 0)
                $numPage++;
            if ($currentPage == $numPage - 1) echo "<span class=\"pagination-link-last\">Trang cuối</span>";
            else {
                echo "<a href=\"?currentPage=" . ($numPage - 1) . "\" class=\"pagination-link-last\">Trang cuối</a>";
            }

            ?>
        </div>

    </div>
</body>

</html>
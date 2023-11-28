<?php
require_once 'pages/connect.php';
$query = "SELECT * FROM products;";
$result = $conn->query($query)->fetch_all();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/userList.css">
    <style>
        .add-user {
            display: flex;
            align-items: flex-end;
            flex-direction: column;
            justify-content: center;
        }

        .user-list {
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            border: 2px solid #000;
        }

        th,
        td {
            /* border: 1px solid black; */
            padding: 8px;
            text-align: left;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-container {
            display: flex;
            justify-content: center;
        }

        .action-container a {
            margin-right: 5px;
        }

        .button-like-a {
            display: inline-block;
            text-decoration: underline;
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-weight: bold;
            padding: 0;
        }

        .button-like-a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="add-user m-2">
        <form method="POST" action="./index.php?page=productAdd">
            <input type="submit" value="Add new product" name="page">
        </form>
    </div>
    <div class="user-list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Img</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    for ($i = 0; $i < count($result); $i++) {
                        $row = $result[$i];
                        if ($row[3] != '') {
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[3]</td>";
                            echo '<td><img style="width: 100px;" src="' . $row[4] . '" alt="Ảnh user"></td>';
                            echo '<td>';
                            echo '<div class="action-container">
                                <form method="POST" action="./index.php?page=productDetail&id=' . $row[0] . '">
                                    <input class="button-like-a" type="submit" value="Chi tiet/" name="page">
                                </form>
                               <form method="POST" action="./pages/productDelete.php?id=' . $row[0] . '">
                                    <input class="button-like-a" type="submit" value="Xoa/" name="page">
                                </form>
                                <form method="POST" action="./index.php?page=productEdit&id=' . $row[0] . '">
                                    <input class="button-like-a" type="submit" value="Sua" name="page">
                                </form>
                                </div>';
                            echo '</td></tr>';
                        }
                    }

                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
// var_dump($_POST);

if (isset($_POST['URL']) && empty($_POST['URL'])) {
    echo 'NHẬP URL ĐI!!!!';
    header("refresh:2;");
    die();
}

if (isset($_POST['URL']) && $_POST['URL'] !== '') {
    if (isset($_COOKIE['listURL'])) {
        try {
            $list = json_decode($_COOKIE['listURL']);
        } catch (\Throwable $th) {
        }
    } else {
        $list = array();
    }
    array_push($list, $_POST['URL']);
    setcookie('listURL', json_encode($list));
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web của Bạn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
        }

        .left-panel {
            width: 40%;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .left-panel h1 {
            font-size: 20px;
        }

        .left-panel input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .left-panel button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .right-panel {
            width: 55%;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .right-panel h1 {
            font-size: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-panel">
            <h1>Nhập URL</h1>
            <form action="" method="POST">
                <input type="text" id="urlInput" name="URL" placeholder="Nhập URL" required>
                <button type="submit" name="submitURL">Submit</button>
            </form>
        </div>
        <div class="right-panel">
            <h1>Các URL đã Submit</h1>
            <ul id="submittedUrls">
                <?php
                if (isset($_COOKIE['listURL'])) {
                    try {
                        $list = json_decode($_COOKIE['listURL']);
                    } catch (\Throwable $th) {
                    }
                    for ($i = 0; $i < count($list); $i++) {
                        echo '<a target="_blank" href="' . $list[$i] . '">' . $list[$i] . '</a> <br>';
                    }
                }
                ?>
            </ul>
            <a href=""></a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
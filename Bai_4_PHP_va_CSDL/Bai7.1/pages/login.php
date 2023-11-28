<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form>
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required><br>

            <div class="button-container">
                <input type="reset" class="reset-button" value="Reset">
                <input type="submit" class="login-button" value="Login">
            </div>
        </form>
    </div>
</body>

</html>

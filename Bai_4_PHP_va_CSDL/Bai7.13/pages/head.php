<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/head.css">
</head>

<body>
    <div class="header-container">
        <img class="img-header" src="./images/header.png" alt="">
        <nav class="pages">
            <form method="POST" action="./index.php">
                <input type="submit" value="Home" name="page">
            </form>
            <form method="POST" action="./index.php">
                <input type="submit" value="List Lop" name="list">
            </form>
            <form method="POST" action="./index.php">
                <input type="submit" value="Add Class" name="addLop">
            </form>
            <form method="POST" action="./index.php">
                <input type="submit" value="List Ho So" name="list2">
            </form>
            <form method="POST" action="./index.php">
                <input type="submit" value="Add Ho So" name="addHoSo">
            </form>
        </nav>
    </div>
</body>

</html>
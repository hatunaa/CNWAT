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
                <input type="submit" value="List Student" name="list">
            </form>
            <form method="POST" action="./index.php">
                <input type="submit" value="Add Student" name="add">
            </form>
            <form method="POST" action="./index.php">
                <input type="submit" value="Gmail" name="gmail">
            </form>
            <form method="POST" action="./index.php">
                <input type="submit" value="Login Yahoo" name="yahoo">
            </form>
        </nav>
    </div>
</body>

</html>
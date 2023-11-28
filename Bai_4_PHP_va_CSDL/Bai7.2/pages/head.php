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
            <form method="POST" action="./index.php?page=calculate">
                <input type="submit" value="Calculate" name="page">
            </form>
            <form method="POST" action="./index.php?page=drawTable">
                <input type="submit" value="DrawTable" name="page">
            </form>
            <form method="POST" action="./index.php?page=register">
                <input type="submit" value="Register" name="page">
            </form>
            <form method="POST" action="./index.php">
                <input type="submit" value="Home" name="page">
            </form>
        </nav>
    </div>
</body>

</html>
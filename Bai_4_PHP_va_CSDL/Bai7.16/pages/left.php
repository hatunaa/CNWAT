<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/left.css">
</head>

<body>
    <div class="m-2" style="height: 100%;">
        <nav class="pages">
            <form method="POST" action="./index.php">
                <input type="submit" value="Return Home" name="page">
            </form>
            <form method="POST" action="./index.php?page=userList">
                <input type="submit" value="Admin Home" name="page">
            </form>
            <form method="POST" action="./pages/logout.php">
                <input type="submit" value="Logout" name="page">
            </form>
            <form method="POST" action="./index.php?page=userList">
                <input type="submit" value="UserManage" name="page">
            </form>
            <form method="POST" action="./index.php?page=categoriesList">
                <input type="submit" value="Categories" name="page">
            </form>
            <form method="POST" action="./index.php?page=productList">
                <input type="submit" value="Product" name="page">
            </form>
        </nav>
    </div>

</body>

</html>
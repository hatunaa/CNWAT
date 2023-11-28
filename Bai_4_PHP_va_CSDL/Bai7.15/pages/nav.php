<?php
require_once 'pages/connect.php';
$query = "SELECT DISTINCT productType FROM products";
$result = $conn->query($query)->fetch_all();
?>

<body>
    <?php
    for ($i = 0; $i < count($result); $i++) {
        echo '<button class="btn">Laptop ' . $result[$i][0] . '</button>';
    }
    ?>
    <img src="img/flower.jpg" alt="">
</body>
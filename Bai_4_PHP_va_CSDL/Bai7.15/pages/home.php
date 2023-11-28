<?php
require_once 'pages/connect.php';
$query = "SELECT * FROM products;";
$result = $conn->query($query)->fetch_all();
?>

<body>
    <div class="mt-4">
        <div class='row'>
            <?php
            for ($i = 0; $i < count($result); $i++) {
                $row = $result[$i];
                $id = $row[0];
                $name = $row[1];
                $desc = $row[2];
                echo "<div class='col-sm-6 col-lg-4'>
                <div class='card mt-4'>
                    <a href='./pages/productDetail.php?id=$id'>
                        <img class='card-img-top' src='https://cdn.tgdd.vn/Products/Images/44/296921/Slider/vi-vn-dell-inspiron-15-3520-i5u085w11blu-2.jpg' alt='' />
                    </a>
                    <div class='card-body'>
                        <a href='./pages/productDetail.php?id=$id'>
                            <h5 class='card-title'>$name</h5>
                        </a>
                        <p class='card-text'>$desc</p>
                        <a href='./pages/productDetail.php?id=$id' class='btn btn-primary'>Mua ngay</a>
                    </div>
                </div>
            </div>";
            }
            ?>
        </div>
    </div>
</body>
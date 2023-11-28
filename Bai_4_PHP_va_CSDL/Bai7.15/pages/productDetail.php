<?php
require_once 'connect.php';

if (!isset($_GET['id'])) {
    echo 'Chọn sản phẩm đi!';
    header("refresh: 2; url=../index.php");
    die();
}
$query = "SELECT * FROM products WHERE ID = ?";
$result = $conn->prepare($query);
$result->bind_param("i", $_GET['id']);
$result->execute();
$result = $result->get_result()->fetch_all();
if (!count($result)) {
    echo 'Sản phẩm không tồn tại!';
    header("refresh: 2; url=../index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        h2 {
            margin-left: 50px;
        }

        ul {
            list-style-type: none;
            background-color: #f2f2f2;
            border-radius: 10px;
            padding: 10px 5px 10px 40px;
        }

        img {
            max-width: 60%;
            height: auto;
            margin: 10px;
        }

        .img-detail {
            max-width: 90%;
            max-height: 100%;
            height: auto;
        }

        .box-description {
            margin: 50px 50px;
            display: flex;
            justify-content: center;
            /* align-items: center; */
            height: auto;
        }
    </style>
</head>

<body>
    <div class="mt-4">
        <h2 class="mb-4"><?php echo $result[0][1]; ?></h2>
        <div class="row">
            <div class="col-lg-4">
                <img class="img-detail ml-5" src="https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/10/11/638010988636808252_dell-inspiron-15-n3520-den-2.jpg" alt="">
            </div>
            <div class="col-lg-8">
                <ul>
                    <li>
                        <i class="my-icon fa-solid fa-laptop"><span style="margin-left: 5px;">15.6 inch, 1920 x 1080 Pixels, WVA, 120 Hz, 220 nits, Anti-Glare LED-Backlit Display</span></i>
                    </li>
                    <li>
                        <i class="my-icon fa-solid fa-microchip"><span style="margin-left: 5px;">Intel, Core i5, 1235U</span></i>
                    </li>
                    <li>
                        <i class="my-icon fa-solid fa-memory"><span style="margin-left: 5px;">8 GB (1 thanh 8 GB), DDR4, 2666 MHz</span></i>
                    </li>
                    <li>
                        <i class="my-icon fa-solid fa-hard-drive"><span style="margin-left: 5px;">SSD 256 GB</span></i>
                    </li>
                    <li>
                        <i class="my-icon fa-solid fa-sim-card"><span style="margin-left: 5px;">SSD 256 GB</span></i>
                    </li>
                </ul>
                <h3 class="ml-5" style="color: red;"><?php echo number_format($result[0][3], 0, '.', '.'); ?>₫</h3>
                <div class="ml-5">
                    <a href='#' class='btn btn-primary'>Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box-description">
                <p><strong>Đặc điểm nổi bật của <?php echo $result[0][1]; ?></strong> <br>
                    <?php echo $result[0][1]; ?> là chiếc laptop lý tưởng cho công việc hàng ngày. Bộ vi xử
                    lý Intel Core i5 thế hệ thứ 12 hiệu suất cao, màn hình lớn 15,6 inch Full HD 120Hz
                    mượt mà, thiết kế bền bỉ sẽ giúp bạn giải quyết công việc nhanh chóng mọi lúc mọi nơi. <br><br>
                    <strong>Hiệu suất nhạy bén từ bộ vi xử lý Intel thế hệ thứ 12</strong> <br>
                    Trên <?php echo $result[0][1]; ?>, bạn sẽ được trải nghiệm hiệu suất nhạy bén và yên
                    tĩnh từ bộ vi xử lý Intel Core i5 1235U. Đây là con chip thuộc thế hệ thứ 12
                    Alder Lake, mạnh mẽ hơn, tiêu tốn ít năng lượng hơn và tỏa nhiệt ít hơn. Với 10
                    nhân 12 luồng, tốc độ tối đa 4.40 GHz, <?php echo $result[0][1]; ?> đủ sức mạnh để làm tốt
                    các công việc hàng ngày như duyệt web, chạy các phần mềm văn phòng. Ngoài ra, với GPU
                    đồ họa Intel Iris Xe đi kèm, <?php echo $result[0][1]; ?> hoàn toàn có thể làm các tác vụ đồ họa
                    như chỉnh sửa ảnh, biên tập video nhẹ hay chơi các game Esports. <br><br>
                    <strong>Nhiều cổng kết nối</strong>
                    Nhằm phục vụ tối ưu cho công việc, Dell Inspiron 15 3000 series có tới 3 cổng kết nối USB,
                    giúp bạn kết nối được nhiều thiết bị hơn. Bạn có thể kết nối với TV hoặc màn hình lớn qua
                    cổng HDMI; tải ảnh nhanh chóng qua khe cắm thẻ nhớ SD hay tận hưởng tốc độ truyền dữ liệu
                    nhanh qua hai cổng USB 3.2 Gen 1, cho khả năng kết nối vượt trội và tốc độ nhanh hơn bao giờ hết.
                </p>
                <img src="https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/images/2015/0511/Dell-Inspiron-N3520-fpt-3.jpg" alt="">
            </div>
        </div>
    </div>
</body>

</html>
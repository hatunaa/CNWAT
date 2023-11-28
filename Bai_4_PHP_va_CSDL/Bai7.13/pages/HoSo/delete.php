<?php
require_once '../connect.php';

if (isset($_GET['id'])) {
    $query = "DELETE FROM HoSo WHERE MaHS=?";
    $result = $conn->prepare($query);
    $result->bind_param('s', $_GET['id']);
    $result->execute();
    if ($result) {
        echo 'Xóa hồ sơ thành công';
        header("Refresh: 2; url=../listHoSo.php");
    }
};

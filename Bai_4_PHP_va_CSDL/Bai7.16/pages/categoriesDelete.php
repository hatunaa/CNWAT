<?php
require_once 'connect.php';
if (!isset($_GET['id'])) {
    echo 'Làm gì có id mà xóa';
    header("Refresh: 2; url=./index.php");
    die();
}
try {
    $query = "DELETE FROM users WHERE id=?";
    $result = $conn->prepare($query);
    $result->bind_param("i", $_GET['id']);
    $result->execute();
    echo 'Xóa thành công';
    header("Refresh: 2; url=../index.php");
    die();
} catch (\Throwable $th) {
    echo 'Có lỗi ' . $th;
    die();
}

<?php
require_once '../connect.php';

if (isset($_POST['Back'])) {
    header("location: ../../index.php");
    die();
}

if (isset($_POST['addUser'])) {
    if ($_POST['maSV'] === '' || $_POST['name'] === '' || $_POST['birthday'] === '' || $_POST['address'] === '' || $_POST['class'] === '' || $_POST['math'] === '' || $_POST['physical'] === '' || $_POST['science'] === '') {
        echo 'Nhập thiếu các trường';
        die();
    } else {
        try {
            $query = "INSERT INTO HoSo VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $result = $conn->prepare($query);
            $maSV = $_POST['maSV'];
            $name = $_POST['name'];
            $birthday = date('Ymd', strtotime($_POST['birthday']));
            $address = $_POST['address'];
            $class = $_POST['class'];
            $math = (float) $_POST['math'];
            $physical = (float) $_POST['physical'];
            $science = (float) $_POST['science'];
            $result->bind_param('ssdsssss', $maSV, $name, $birthday, $address, $class, $math, $physical, $science);
            $result->execute();
            if ($result) {
                echo 'Thêm hồ sơ thành công';
                header("Refresh: 2; url=./listHoSo.php");
            }
        } catch (\Throwable $th) {
            echo 'Có lỗi ' . $th;
        }
    }
};

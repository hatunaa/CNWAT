<?php
require_once 'connect.php';

if (isset($_POST['updateLop'])) {
    if ($_POST['MaLop'] === '' || $_POST['TenLop'] === '' || $_POST['KhoaHoc'] === '' || $_POST['GVCN'] === '') {
        echo 'Điền đầy đủ thông tin';
        die();
    } else {
        try {
            $query = "Update LOP set MaLop=?, TenLop=?, KhoaHoc=?, GVCN=? where MaLop=?";
            $result = $conn->prepare($query);
            $result->bind_param('ssiss', $_POST['MaLop'], $_POST['TenLop'], $_POST['KhoaHoc'], $_POST['GVCN'], $_POST['MaLop']);
            $result->execute();
            if ($result) {
                echo 'cap nhat thanh cong';
                header("Refresh: 2; url=../index.php");
            }
        } catch (\Throwable $th) {
            echo 'Đã xảy ra vấn đề' . $th;
            header("Refresh: 2; url=../editLop?id=" . $_POST['MaLop']);
        }
    }
};

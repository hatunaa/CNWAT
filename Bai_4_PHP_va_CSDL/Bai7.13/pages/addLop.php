<?php
require_once 'connect.php';

if (isset($_POST['addUser'])) {
    if ($_POST['MaLop'] === '' || $_POST['TenLop'] === '' || $_POST['KhoaHoc'] === '' || $_POST['GVCN'] === '') {
        echo 'rong';
        die();
    } else {
        try {
            $query = "INSERT INTO LOP VALUES (?, ?, ?, ?)";
            $result = $conn->prepare($query);
            $result->bind_param('ssis', $_POST['MaLop'], $_POST['TenLop'], $_POST['KhoaHoc'], $_POST['GVCN']);
            $result->execute();
            if ($result) {
                echo 'Thêm lớp thành công';
                header("Refresh: 2; url=../index.php");
            }
        } catch (\Throwable $th) {
            echo 'Có lỗi' . $th;
            header("Refresh: 2; url=../index.php");
        }
    }
};

<?php
require_once '../connect.php';

if (isset($_POST['Back'])) {
    header("location: ../../index.php");
    die();
}

if (isset($_POST['updateHoSo'])) {
    if ($_POST['MAHS'] === '' || $_POST['name'] === '' || $_POST['birthday'] === '' || $_POST['address'] === '' || $_POST['class'] === '' || $_POST['math'] === '' || $_POST['physical'] === '' || $_POST['science'] === '') {
        echo 'Nhập thiếu các trường';
        die();
    } else {
        try {
            $query = "UPDATE HoSo SET MAHS=?, HoTen=?, NgaySinh=?, DiaChi=?, Lop=?, DiemToan=?, DiemLy=?, DiemHoa=? WHERE MAHS=?;";
            $result = $conn->prepare($query);
            $maSV = $_POST['MAHS'];
            $name = $_POST['name'];
            $birthday = date('Ymd', strtotime($_POST['birthday']));
            $address = $_POST['address'];
            $class = $_POST['class'];
            $math = (float) $_POST['math'];
            $physical = (float) $_POST['physical'];
            $science = (float) $_POST['science'];
            $maHSold = $_GET['id'];
            $result->bind_param('ssdssssss', $maSV, $name, $birthday, $address, $class, $math, $physical, $science, $maHSold);
            $result->execute();
            if ($result) {
                echo 'Thay đổi hồ sơ thành công';
                header("Refresh: 2; url=./listHoSo.php");
            }
        } catch (\Throwable $th) {
            echo 'Có lỗi ' . $th;
        }
        // $query = "Update $table set name=?, phonenumber=? where id=?";
        // $result = $conn->prepare($query);
        // $result->bind_param('ssi', $_POST['name'], $_POST['phone'], $_GET['id']);
        // $result->execute();
        // if ($result) {
        //     echo 'cap nhat thanh cong';
        //     header("Refresh: 2; url=../index.php");
        // }
    }
};

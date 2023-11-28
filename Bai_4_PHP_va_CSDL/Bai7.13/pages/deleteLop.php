<?php
require_once 'connect.php';
$query = "DELETE FROM LOP WHERE MaLop=?";
$result = $conn->prepare($query);
$result->bind_param("s", $_GET['id']);
$result->execute();
if ($result) {
    echo 'cap nhat thanh cong';
    header("Refresh: 2; url=../../index.php");
}

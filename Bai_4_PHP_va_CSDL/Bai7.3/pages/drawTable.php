<?php
$row = '';
$col = "";
if (isset($_POST['row']) && $_POST['col']) {
    $row =  $_POST['row'];
    $col = $_POST['col'];
}
if (isset($_POST['delete'])) {
    $row =  '';
    $col = '';
}
?>

<body>
    <div class="table-center-container">
        <div>
            <p>Form vẽ bảng</p>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="">Số dòng:</label>
                    <input class="form-control" value="" name="row" type="text" />
                </div>
                <div class="form-group mb-3">
                    <label for="">Số cột:</label>
                    <input class="form-control" value="" name="col" type="text" />
                </div>
                <button class="btn btn-danger btn-delete" type="submit" name="delete">Nhập lại</button>
                <input class="btn btn-primary" type="submit" value="Vẽ" name="submit">
            </form>
        </div>
        <table class="table-center table-bordered mt-3">
            <?php

            if (!$row || !$col) {
                echo "";
            } else {

                for ($i = 0; $i < $row; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j <= $i; $j++) {
                        $valueTd = $j + 1;
                        echo "<td>$valueTd</td>";
                    }
                    for ($j = $i + 1; $j < $col; $j++) {
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>


</body>
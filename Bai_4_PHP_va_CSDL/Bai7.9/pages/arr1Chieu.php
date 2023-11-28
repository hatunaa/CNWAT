<?php
$n = 10;
$arrValue = [];
if (isset($_POST['calculate_total_oda'])) {
    for ($i = 1; $i <= $n; $i++) {
        array_push($arrValue, $_POST['value_' . $i]);
    }
}
?>

<div class="one-dimensional-array-container">
    <form method="POST" action="">
        <?php
        if ($n && $arrValue) {
            for ($i = 1; $i <= $n; $i++) {
                $index_value = $i - 1;
                echo "<input class='value_arr' type='number' name='value_$i' value='$arrValue[$index_value]' />";
            }
        } else {
            for ($i = 1; $i <= $n; $i++) {
                $index_value = $i - 1;
                echo "<input class='value_arr' type='number' name='value_$i' value='' />";
            }
        }
        ?>
        <div class="mt-3">
            <input class="btn btn-primary" type="submit" name="calculate_total_oda" value="Calculate">
            <input class="btn btn-danger" type="submit" name="reset_total_oda" value="Reset">
        </div>
    </form>
    <div class="result-oda">
        <h3>KẾT QUẢ</h3>
        <p>Tổng: <?php if ($n && $arrValue) echo sumArray($arrValue) ?></p>
        <p>Trung bình: <?php if ($n && $arrValue) echo averageArray($arrValue) ?></p>
        <p>Min: <?php if ($n && $arrValue) echo minArray($arrValue) ?></p>
        <p>Max: <?php if ($n && $arrValue) echo maxArray($arrValue) ?></p>
    </div>
</div>
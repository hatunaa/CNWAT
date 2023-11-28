<?php
$result = "";
$firstNumber = "";
$secondNumber = "";
$calculation = "";
if (!empty($_POST['calculation']) && isset($_POST['first_number']) && isset($_POST['second_number'])) {
    $firstNumber = $_POST['first_number'];
    $secondNumber = $_POST['second_number'];
    foreach ($_POST['calculation'] as $value) {
        $calculation = $value;
    };
}

try {
    switch ($calculation) {
        case "plus":
            $result = $firstNumber + $secondNumber;
            break;
        case "minus":
            $result = $firstNumber - $secondNumber;
            break;
        case "multiply":
            $result = $firstNumber * $secondNumber;
            break;
        case "devide":
            $result = $firstNumber / $secondNumber;
            break;;
        default:
            $result = "Hãy chọn đủ thông tin!";
            break;
    }
} catch (Exception $e) {
    echo 'Message: ' . $e;
}
    
?>

<body>
    <div class="calculate2-container">
        <form method="POST" action="index.php">

            <table class="table-bordered">
                <tr>
                    <td>Số 1</td>
                    <td>
                        <?php  ?>
                        <input type="number" name="first_number" value="<?php echo $firstNumber !== "" ? $firstNumber : "" ?>">
                    </td>
                </tr>
                <tr>
                    <td>Số 2</td>
                    <td>
                        <input type="number" name="second_number" value="<?php echo $secondNumber !== "" ? $secondNumber : "" ?>">
                    </td>
                </tr>
                <tr>
                    <td>Phép tính</td>
                    <td>
                        <span class="ms-4"><input type="checkbox" name="calculation[]" value="plus"> + </span>
                        <span class="ms-4"><input type="checkbox" name="calculation[]" value="minus"> - </span>
                        <span class="ms-4"><input type="checkbox" name="calculation[]" value="multiply"> * </span>
                        <span class="ms-4"><input type="checkbox" name="calculation[]" value="devide"> / </span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" name="page" value="submitCalculate">
                    </td>
                </tr>
                <tr>
                    <td>Kết quả</td>
                    <td>
                        <?php
                        // var_dump($result);
                        // die();
                        echo $result;
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
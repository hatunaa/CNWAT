<?php
$fullname = "";
$class = "";
$score_1 = "";
$score_2 = "";
$score_3 = "";
$totalScore = "";
if (isset($_POST['submitTotalScore'])) {
    if (!empty($_POST['fullname']) && !empty($_POST['class']) && isset($_POST['score_1']) && isset($_POST['score_2']) && isset($_POST['score_3'])) {
        $fullname = $_POST['fullname'];
        $class = $_POST['class'];
        $score_1 = $_POST['score_1'];
        $score_2 = $_POST['score_2'];
        $score_3 = $_POST['score_3'];
        $totalScore = $score_1 + $score_2 + $score_3;
    }
}
if (isset($_POST['cancelTotalScore'])) {
    $fullname = "";
    $class = "";
    $score_1 = "";
    $score_2 = "";
    $score_3 = "";
    $totalScore = "";
}
?>
<body>
    <div class="total-score-container">
        <form method="POST" action="./pages/result.php">

            <div class="form-group">
                <label for="">Họ và tên:</label>
                <input class="form-control" type="text" name="fullname" value="<?php echo $fullname ? $fullname : "" ?>" />
            </div>
            <div class="form-group">
                <label for="">Lớp:</label>
                <input class="form-control" type="text" name="class" value="<?php echo $class ?>" />
            </div>
            <div class="form-group">
                <label for="">Điểm 1:</label>
                <input class="form-control" type="number" name="score_1" value="<?php echo $score_1 ?>" />
            </div>
            <div class="form-group">
                <label for="">Điểm 2:</label>
                <input class="form-control" type="number" name="score_2" value="<?php echo $score_2 ?>" />
            </div>
            <div class="form-group">
                <label for="">Điểm 3:</label>
                <input class="form-control" type="number" name="score_3" value="<?php echo $score_3 ?>" />
            </div>
            <div class="form-group mb-3">
                <label for="">Tổng điểm:</label>
                <input class="form-control" type="text" name="totalScore" value="<?php echo $totalScore ?>" />
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="submitTotalScore" value="OK">
                <input class="btn btn-danger" type="submit" name="cancelTotalScore" value="Cancel">
            </div>
        </form>
    </div>
</body>
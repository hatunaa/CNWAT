<?php
$name = '';
$note = "";
$password = '';
$gender = "";
$address = "";
$programmingLanguage = "";
$skill = "";
$marriageStatus = "";
$validate = false;
if (!empty($_POST["name"]) && isset($_POST["note"]) && ($_POST["note"] !== "") && isset($_POST["password"]) && ($_POST["password"] !== "") && !empty($_POST["gender"]) && !empty($_POST["programmingLanguage"]) && !empty($_POST["skill"])) {
    $validate = true;
    $name = $_POST["name"];
    $note = $_POST["note"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    for ($i = 0; $i < count($_POST["programmingLanguage"]); $i++) {
        if ($i === 0) {
            $programmingLanguage = $_POST["programmingLanguage"][$i];
        } else {
            $programmingLanguage = $programmingLanguage . "," . $_POST["programmingLanguage"][$i];
        }
    }
    $skill = $_POST["skill"];
    $marriageStatus =  isset($_POST["marriageStatus"]) && $_POST["marriageStatus"] === "1" ? "Đã kết hôn" : "Chưa kết hôn";
}
?>

<div class="register-result-container">
    <?php
    if ($validate) {
        echo "<h3><b>Kết quả đăng ký</b></h3>";
        echo "<div>";
        echo "Username: <span>$name</span>";
        echo "</div>";
        echo "<div class='mt-3'>";
        echo "Password: <span>$password</span>";
        echo " </div>";
        echo "<div class='mt-3'>";
        echo "Gender: <span>$gender</span>";
        echo " </div>";
        echo "<div class='mt-3'>";
        echo "Address: <span>$address</span>";
        echo " </div>";
        echo "<div class='mt-3'>";
        echo "Enable Programming Language: <span>$programmingLanguage</span>";
        echo " </div>";
        echo "<div class='mt-3'>";
        echo "Skill: <span>$skill</span>";
        echo " </div>";
        echo "<div class='mt-3'>";
        echo "Note: <span>$note</span>";
        echo " </div>";
        echo "<div class='mt-3'>";
        echo "Marriage Status: <span>$marriageStatus</span>";
        echo " </div>";
    }
    ?>
</div>
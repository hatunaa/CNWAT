<?php
require_once 'define.php';
if (!empty($_POST["username"]) && !empty($_POST["gender"]) && !empty($_POST["address"]) && !empty($_POST["note"])) {
    $username = $_POST["username"];
    $note = $_POST["note"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];

    if ($_COOKIE['lang'] == 1) {
        echo '<h3><b>' . infoContactEn . '</b></h3>
        <div>
        Username: <span>' . $username . '</span>
        </div>
        <div class="mt-3">
        ' . genderEn . ': <span>' . $gender . '</span>
         </div>
        <div class="mt-3">
        ' . addressEn . ': <span>' . $address . '</span>
         </div>
        <div class="mt-3">
        ' . noteEn . ': <span>' . $note . '</span>
         </div>';
    } else {
        echo '<h3><b>' . infoContactVn . '</b></h3>
        <div>
        Username: <span>' . $username . '</span>
        </div>
        <div class="mt-3">
        ' . genderVn . ': <span>' . $gender . '</span>
         </div>
        <div class="mt-3">
        ' . addressVn . ': <span>' . $address . '</span>
         </div>
        <div class="mt-3">
        ' . noteVn . ': <span>' . $note . '</span>
         </div>';
    }
} else {
    if ($_COOKIE['lang'] == 1) {
        echo '
        <div class="form">
            <h2>' . contactFormEn . '</h2>
            <form method="POST" action="">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label>' . genderEn . ':</label>
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">' . maleEn . '</label>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">' . femaleEn . '</label>
                </div>
                <div>
                    <label for="address">' . addressEn . ':</label>
                    <select id="address" name="address">
                        <option value="HN">Hà Nội</option>
                        <option value="TPHCM">Thành phố HCM</option>
                        <option value="DN">Đà Nẵng</option>
                    </select>
                </div>
                <div>
                    <label for="note">' . noteEn . ':</label>
                    <textarea id="note" name="note"></textarea>
                </div>
                <div>
                    <input type="reset" value="' . resetEn . '">
                    <input type="submit" value="' . submitEn . '" name="SubmitFormContact">
                </div>
            </form>
        </div>
        ';
    } else {
        echo '
        <div class="form">
            <h2>' . contactFormVn . '</h2>
            <form method="POST" action="">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label>' . genderVn . ':</label>
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">' . maleVn . '</label>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">' . femaleVn . '</label>
                </div>
                <div>
                    <label for="address">' . addressVn . ':</label>
                    <select id="address" name="address">
                        <option value="HN">Hà Nội</option>
                        <option value="TPHCM">Thành phố HCM</option>
                        <option value="DN">Đà Nẵng</option>
                    </select>
                </div>
                <div>
                    <label for="note">' . noteVn . ':</label>
                    <textarea id="note" name="note"></textarea>
                </div>
                <div>
                    <input type="reset" value="' . resetVn . '">
                    <input type="submit" value="' . submitVn . '" name="SubmitFormContact">
                </div>
            </form>
        </div>
        ';
    }
}

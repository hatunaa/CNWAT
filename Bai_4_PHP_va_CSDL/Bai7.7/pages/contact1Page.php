<?php
if (!empty($_POST["username"]) && !empty($_POST["gender"]) && !empty($_POST["address"]) && !empty($_POST["note"])) {
    $username = $_POST["username"];
    $note = $_POST["note"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];

    echo '<h3><b>Thông tin liên hệ</b></h3>
    <div>
    Username: <span>' . $username . '</span>
    </div>
    <div class="mt-3">
    Gender: <span>' . $gender . '</span>
     </div>
    <div class="mt-3">
    Address: <span>' . $address . '</span>
     </div>
    <div class="mt-3">
    Note: <span>' . $note . '</span>
     </div>';
} else {
    echo '
<div class="form">
    <h2>Form liên hệ</h2>
    <form method="POST" action="">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
        </div>
        <div>
            <label for="address">Address:</label>
            <select id="address" name="address">
                <option value="HN">Hà Nội</option>
                <option value="TPHCM">Thành phố HCM</option>
                <option value="DN">Đà Nẵng</option>
            </select>
        </div>
        <div>
            <label for="note">Note:</label>
            <textarea id="note" name="note"></textarea>
        </div>
        <div>
            <input type="reset" value="Reset">
            <input type="submit" value="Contact" name="SubmitFormContact">
        </div>
    </form>
</div>
';
}

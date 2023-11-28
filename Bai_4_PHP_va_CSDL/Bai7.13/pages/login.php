<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'admin' && $password === 'admin') {
        session_start();
        $_SESSION['username'] = 'admin';
        $_SESSION['password'] = 'admin';
        setcookie('username', $username, time() + 30 * 24 * 60 * 60);
        setcookie('password', $password, time() + 30 * 24 * 60 * 60);

        header("location: admin/index.php");
        die();
    } else {
        echo '<strong>Username hoặc password không đúng</strong>';
    }
}
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    echo '1';
    header("location: admin/index.php");
    die();
}
session_destroy();
?>

<div class="login-container">
    <h2>Login</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <?php if (isset($_COOKIE['username'])) {
            echo '<input type="text" id="username" name="username" value="' . $_COOKIE['username'] . '" required>';
        } else {
            echo '<input type="text" id="username" name="username" required>';
        } ?>
        <!-- <input type="text" id="username" name="username" required> -->

        <label for="password">Password:</label>
        <?php if (isset($_COOKIE['username'])) {
            echo '<input type="password" id="password" name="password" value="' . $_COOKIE['username'] . '" required>';
        } else {
            echo '<input type="password" id="password" name="password" required>';
        } ?>
        <!-- <input type="password" id="password" name="password" required> -->

        <button type="submit" name="loginProcess">Login</button>
    </form>
</div>
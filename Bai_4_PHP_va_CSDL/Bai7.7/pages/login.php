<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'admin' && $password === 'admin') {
        session_start();
        $_SESSION['username'] = 'admin';
        $_SESSION['password'] = 'admin';
        header("location: admin/index.php");
    } else {
        echo '<strong>Username hoặc password không đúng</strong>';
    }
}
?>

<div class="login-container">
    <h2>Login</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="loginProcess">Login</button>
    </form>
</div>
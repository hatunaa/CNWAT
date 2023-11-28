<body>
    <div class="header-container">
        <img class="img-header" src="./images/header.png" alt="">
        <div class="pages" style="justify-content: space-between;">
            <div class="left">
                <form method="POST" action="./index.php">
                    <input type="submit" value="<?php if ($_COOKIE['lang'] == 1) echo en;
                                                else echo vn; ?>" name="lang">
                </form>
            </div>
            <div class="right">
                <form method="POST" action="./index.php" style="margin-right: 5px;">
                    <input type="submit" value="<?php if ($_COOKIE['lang'] == 1) echo homeEn;
                                                else echo homeVn; ?>" name="page">
                </form>
                <form method="POST" action="./index.php">
                    <input type="submit" value="<?php if ($_COOKIE['lang'] == 1) echo contactFormEn;
                                                else echo contactFormVn; ?>" name="contact">
                </form>
            </div>
        </div>
    </div>
</body>
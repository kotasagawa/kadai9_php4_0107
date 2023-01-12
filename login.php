<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="login.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>ログイン画面</title>
</head>

<body>
<main id="main">
    <h1>ログインページ</h1>
    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <div id="login-inner">
        <form name="form1" action="login_act.php" method="post">
            <label>ID:</label>
                <input class="txt" type="text" name="lid" /><br>
            <label>PW:</label>
                <input class="txt" type="password" name="lpw" /><br>
            <input id="btn" type="submit" value="ログイン" />
        </form>
        <div id="back-outer">
        <a id="entry" href="entry.php">アカウント登録</a>
        </div>
    </div>
</main>

</body>

</html>
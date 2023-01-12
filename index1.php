<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="index_1.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <div><a href="login.php">ログイン</a></div>
            <div><a href="logout.php">ログアウト</a></div>
        </nav>
    </header>

    <!-- Main[Start] -->
    <form method="post" action="insert2.php">
        <div class="register">
            <h2>英単語</h2>
                <fieldset>
                    <div class="fieldset-inner">
                        <label>英単語：</label><br>
                         <input type="text" name="content1"><br>
                        <label>意味：</label><br>
                         <input type="text" name="content2"><br>
                        <div id="btn-outer">
                            <input id="btn" type="submit" value="REGISTER" onclick="clk()">
                        </div>
                    </div>
                </fieldset>
        </div>
    </form>
    <div id="btn-reg">
        <a href="select3.php"><p>単語帳を見る</p></a>
    </div>
    <!-- Main[End] -->

<script>
 
 function clk() {
           alert("単語帳に登録しました！");
       }
</script>
</body>

</html>

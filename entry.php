<?php 
require("./dbconnect.php");
session_start();
 
// 最初にアクセスしたときはif文には入らず、フォームが送信されたらif文に入る
if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['lid'] === "") {
        $error['lid'] = "blank";
    }
    if ($_POST['lpw'] === "") {
        $error['lpw'] = "blank";
    }
    
    /* メールアドレスの重複を検知 */
    if (!isset($error)) {
        $member = $db->prepare('SELECT COUNT(*) as cnt FROM gs_user_table WHERE lid=?');
        $member->execute(array(
            $_POST['lid']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['lid'] = 'duplicate';
        }
    }
 
    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: check.php');   // check.phpへ移動
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>アカウント作成</title>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <form action="" method="POST">
            <h1>アカウント作成</h1>
            <p>次のフォームに必要事項を入力してアカウント登録をしましょう。</p>
            <br>
 
            <div class="control">
                <label for="name">ユーザー名</label>
                <input id="name" type="text" name="name">
            </div>
 
            <div class="control">
                <label for="email">メールアドレス<span class="required">必須</span></label>
                <input id="email" type="email" name="lid">
                <?php if (!empty($error["lid"]) && $error['lid'] === 'blank'): ?>
                    <p class="error">＊メールアドレスを入力してください</p>
                <?php elseif (!empty($error["lid"]) && $error['lid'] === 'duplicate'): ?>
                    <p class="error">＊このメールアドレスはすでに登録済みです</p>
                <?php endif ?>
            </div>
 
            <div class="control">
                <label for="password">パスワード<span class="required">必須</span></label>
                <input id="password" type="password" name="lpw">
                <?php if (!empty($error["lpw"]) && $error['lpw'] === 'blank'): ?>
                    <p class="error">＊パスワードを入力してください</p>
                <?php endif ?>
            </div>
 
            <div class="control">
                <button type="submit" class="btn">確認する</button>
            </div>
        </form>
    </div>
</body>
</html>
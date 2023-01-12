<?php

session_start();
require_once('funcs.php');
loginCheck();

/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */

$id = $_GET['id'];

try {
  $db_name = 'gs_kadai2'; //データベース名
  $db_id   = 'root'; //アカウント名
  $db_pw   = ''; //パスワード：MAMPは'root'
  $db_host = 'localhost'; //DBホスト
  $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
  exit('DB Connection Error:' . $e->getMessage());
}

$stmt = $pdo->prepare('SELECT * FROM gs_gs_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
  //*** function化する！******\
  $error = $stmt->errorInfo();
  exit('SQLError:' . print_r($error, true));
} else {
  //データが取得できた場合の処理
  $result = $stmt->fetch();
}

?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>単語帳</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="index_1.css" rel="stylesheet">
</head>

<body>

    <!-- Main[Start] -->
    <form method="post" action="update4.php">
        <div class="register">
        <h2>超単語帳</h2>
            <fieldset>
            <div class="fieldset-inner">
                <label>英単語：</label><br>
                    <input type="text" name="content1" value="<?= $result['content1']?>"><br>
                <label>日本語：</label><br>
                    <input type="text" name="content2" value="<?= $result['content2']?>"><br>
                <div id="btn-outer">
                    <input type="hidden" name="id" value="<?= $result['id']?>">
                    <input id="btn" type="submit" value="UPDATE" onclick="clk()">
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
           alert("更新しました。");
       }
</script>
</body>

</html>

<?php
/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得、index_1.phpからデータを受け取る
$dbName = 'mysql:dbname=gs_kadai2;charset=utf8;host=localhost';
$userName = 'root';
$content1 = $_POST['content1'];
$content2 = $_POST['content2'];

//2. DB接続します
try {
    //ID:'root', Password: xamppは 空白 '' どこに誰が保存するか指定
    $pdo = new PDO($dbName, $userName, '');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO
                        gs_gs_table(id, content1, content2, indate)
                        VALUES(NULL, :content1, :content2, sysdate() )");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':content1', $content1, PDO::PARAM_STR);
$stmt->bindValue(':content2', $content2, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
} else {
    //５．index.phpへリダイレクト
    header('Location: index1.php');
}

?>
<?php
try {
    $db = new PDO('mysql:dbname=gs_kadai2;host=127.0.0.1;charset=utf8', 'root', '');
}   catch (PDOException $e) {
    echo "データベース接続エラー　：".$e->getMessage();
}
?>
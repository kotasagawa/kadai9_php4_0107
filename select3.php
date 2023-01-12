<?php

session_start();
require_once('funcs.php');
loginCheck();
// if ( !isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
//   exit('LOGIN ERROR');
//   //ろぐいんできない
// } else {
//   //ろぐいんOK
//   session_regenerate_id(true);
//   $_SESSION['chk_ssid'] = session_id();
// }



//XSS対応
// function h($str) {
//   return htmlspecialchars($str, ENT_QUOTES);
// }




//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_kadai2;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_gs_table;");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

  //elseの中は、SQL実行成功した場合
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  //1行とってきたらresultに格納,中身がなくなったら終了
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

    $view .=
    '<div class="contents">' . 
      '<div class="card-front">' . 
          // '<p>' . '番号：' . $result['id'] . '</p>' .  
          '<p class="date">' . '登録日時：' . $result['indate'] . '</p>' .
          '<p class="english" style="display:inline;">' . h($result['content1']) . '</p>' .
          '<button class="btn-pronounce">発音を確認</button>' . 
          '<a href="#" class="show-hide-btn">答えを見る</a>' .
      '</div>' .
      '<div class="card-back hide">' .  
          '<p>' . '意味：' . h($result['content2']) . '</p>' .
      '</div>' . 
      '<a href="detail5.php?id=' . $result['id'] . '">' .
      ' <i class="fa-solid fa-pen-to-square fa-lg" style="color: #5a82f0;"></i> ' . 
      '</a>' .  
      '<a href="delete6.php?id=' . $result['id'] . '">' . 
      ' <i class="fa-solid fa-trash fa-lg" style="color: #ff7f7f;"></i> ' . 
      '</a>' .
    '</div>' ;
  }

}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/4199144150.js" crossorigin="anonymous"></script>
<title>単語帳</title>
<link rel="stylesheet" href="select_3.css">

</head>
<body id="main">
    <!-- Head[Start] -->
    <header>
        <p id="hello">こんにちは、<?php echo htmlspecialchars($_SESSION['name'], ENT_QUOTES); ?>さん</p>
          <div class="hdr">
          <a href="index_1.php">英単語</a>
          </div>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div id="search-wrapper">
      <input type="text" id="search"> <input type="button" value="絞り込む" id="button"> <input type="button" value="すべて表示" id="button2">
    </div>
    <div>
        <div class="container"><?= $view ?></div>
    </div>
    <!-- Main[End] -->
    <div id="back-outer">
      <a id="back" href="index1.php">登録画面へ戻る</a>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

  //日本語の表示・非表示
  $(function() {
    $('.show-hide-btn').click(function(){
        $(this).parent().next().toggle();
    });
});

// 発音ボタン
$(function() {
  $('.btn-pronounce').click(function(){
    let result = $(this).prev().text();
    let u = new SpeechSynthesisUtterance();
    u.lang = 'en-US';
    u.text = result;
    speechSynthesis.speak(u);
  });
});

</script>
</body>
</html>

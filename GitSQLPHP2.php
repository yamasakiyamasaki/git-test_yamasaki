<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Git・PHP・SQLテスト課題</title>
</head>

<body>
   
<?php

      // データベース接続の設定
      $servername = "127.0.0.1";
      $username   = "root";
      $password   = "";
      $dbname     = "git-test";

      // MySQLiオブジェクトの作成
      $conn = new mysqli($servername, $username, $password, $dbname);

      // 接続エラーの確認
     if ($conn->connect_error) {
     exit('データベースに接続できませんでした。'.$conn->connect_error);
     }

     // 文字コードの設定
     $conn->set_charset("utf8");

     // POSTリクエストを処理する
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // フォームデータの取得
     $name    = $_POST['name'] ?? '';
     $email   = $_POST['email'] ?? '';
     $message = $_POST['comment'] ?? '';

     // クエリの実行
     $sql = "INSERT INTO comments (name, email, message) VALUES ('$name', '$email', '$message')";
     if ($conn->query($sql) === TRUE) {
      echo "<p>登録が完了しました。<br /><a href='GitSQLPHP.php'>戻る</a></p>";
     } else {
      echo "データを登録できませんでした。" . $conn->error;
    }
   }
   ?>
   
</body>

</html>
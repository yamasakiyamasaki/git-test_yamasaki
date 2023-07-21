<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Git・PHP・SQLテスト課題</title>
</head>

<body>
  
  <div class="profile">

    <h1>
      プロフィール
    </h1>
    <p>ふたば幼稚園在籍。5歳。</p>
    <img src="./GitSQLPHP/01.png">
    <h1>
      自己紹介
    </h1>
    <p>よろしくだぞ</p>
<!-- テスト -->
  </div>

    <div class="otoiawase">

     <form action="GitSQLPHP2.php" method="post">

       <label for="name">名前:</label><br />
       <input type="text" id="name" name="name" size="30" value="" required><br />

       <label for="email">メールアドレス:</label><br />
       <input type="text"  id="email" name="email" size="30" value="" required><br />

       <label for="message">メッセージ:</label><br />
       <textarea id="message" name="comment" cols="30" rows="5"required></textarea><br />
       <br />
       <input type="submit" value="登録する" />

     </form>

    </div>
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
      echo "<p>登録が完了しました。<br /><a href='GitSQLPHP2.php'>戻る</a></p>";
     } else {
      echo "データを登録できませんでした。" . $conn->error;
    }
   }

   // データベースからデータを取得
   $sql = "SELECT * FROM comments";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    // データがある場合はテーブルとして表示
    echo "<table border='1'>";
    echo "<tr><th>名前</th><th>メールアドレス</th><th>メッセージ</th></tr>";
    while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["message"] . "</td>";
    echo "</tr>";
  }
    echo "</table>";
  } else {
    echo "データがありません。";
  }

  // データベースの接続を閉じる
  $conn->close();
  ?>

</body>

</html>
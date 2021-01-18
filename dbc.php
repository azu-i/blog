<?php

 require_once('env.php');
  //データベース接続
  //@param  なし
  //@return $dsn
  function dbConnect()
  {
    $host = DB_HOST;
    $dbname = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;
    $dsn = "mysql:host=$host;dbname=$dbname;charset = utf8";
    
    try {
      $dbh = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]);
    } catch (PDOException $e) {
      echo '接続失敗' . $e->getMessage();
      throw new Exception();
    };
    return $dbh;
  }

  //データを取得
  //@param なし
  //@return 
  function getAllBlog()
  {
    $dbh = dbConnect();
    //①SQLの準備
    $sql = 'SELECT * FROM blog';
    //②SQLの実行
    $stmt = $dbh->query($sql);
    return $stmt->fetchall(PDO::FETCH_ASSOC);
  }
  $blogData = getAllBlog();

  //カテゴリー名を表示
  function getCategoryName($category)
  {
    if ($category === "1") return "日常";
    if ($category === "2") return "プログラミング";
    return "その他";
  }

  function getBlog($id)
  {
    if (empty($id)) exit('IDが不正です');

    $dbh = dbConnect();
    //SQL準備
    $stmt = $dbh->prepare('SELECT * FROM blog Where id = :id');
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    //SQL実行
    $stmt->execute();
    //結果を取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) throw new Exception('ブログがありません');

    return $result;
  }

  function delete($id)
  {
    if (empty($id)) throw new Exception('IDが不正です');

    $dbh = dbConnect();
    //SQL準備
    $stmt = $dbh->prepare('DELETE FROM blog Where id = :id');
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    //SQL実行
    $stmt->execute();

    return $result;
  }

?>
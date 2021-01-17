<?php
  
  require_once('dbc.php');

  $id = $_GET['id'];
  $result = getBlog($id);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="blog.css">
  <title>○○'s Blog</title>
</head>
<body>
  <h1>○○'s Blog詳細</h1>
    <div class="post">
      <h2>Title:<?php echo $result['title'];?></h2>
      <p>
        投稿日時：<?php echo $result['post_at'];?> 
      </p>
      <p>
        カテゴリー：<?php echo getCategoryName($result['category']);?> 
      </p>
      <p>
         本文：<?php echo $result['content'];?> 
      </p>
      <a href="/blog/index.php">投稿一覧</a>
    </div>

</body>
</html>
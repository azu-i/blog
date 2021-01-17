<?php
require_once('dbc.php');

$id = $_GET['id'];
$result = getBlog($id);

$id = $result['id'];
$title = $result['title'];
$content = $result['content'];
$category = (int)$result['category'];
$public_status = (int)$result['public_status'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="blog.css">
  <title>○○'s Blog</title>
</head>

<body>
  <h1>○○'s Blog</h1>
  <div class="post">
    <h2>投稿更新</h2>
    <form action="blog_update.php" method="POST">
      <input type="hidden" name="id" value=<?php echo $id ?>>
      <p>ブログタイトル：</p>
      <input type="text" name="title" value="<?php echo $title ?>">
      <p>ブログ本文：</p>
      <textarea name="content" id="content" cols="30" rows="10"><?php echo $content ?></textarea>
      <br>
      <p>カテゴリ：</p>
      <select name="category">
        <option value="1" <?php if ($category === 1) echo "selected" ?>>日常</option>
        <option value="2" <?php if ($category === 1) echo "selected" ?>>プログラミング</option>
      </select>
      <br>
      <input type="radio" name="public_status" value="1" <?php if ($public_status === 1) echo "checked" ?>>公開
      <input type="radio" name="public_status" value="2" <?php if ($public_status === 2) echo "checked" ?>>非公開 <br>
      <input type="submit" value="更新">
    </form>
    <p class="home"><a href="/blog/index.php">投稿一覧</a></p>
  </div>
</body>

</html>
<?php
require_once('dbc.php');


$blogData = getAllBlog();
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
  <p class="post-link"><a href="/blog/form.html">投稿</a></p>
  <div class="post">
    <?php foreach ($blogData as $archive) : ?>
      <h2><?php echo $archive['title']; ?></h2>
      <p>
        <?php echo $archive['content']; ?>
      </p>
      <a href="/blog/detail.php?id=<?php echo $archive['id'] ?>">詳細</a>
      <a href="/blog/update_form.php?id=<?php echo $archive['id'] ?>">編集</a>
        投稿日or更新日：<?php echo $archive['post_at']; ?>
      <?php endforeach; ?>
      </p>
  </div>
</body>

</html>
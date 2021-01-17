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
      <div class="comment">
        <h3>通りすがり１</h3>
        <p>
          記事１へのコメントです。<br>
          記事１へのコメントです。<br>
        </p>
      </div>
      <div class="comment">
        <h3>通りすがり２</h3>
        <p>
          記事１へのコメントです。
        </p>
      </div>
      <p class="commment_link">
        投稿日：2011/6/7
        <a href="#">コメント</a>
      <?php endforeach; ?>
      </p>
  </div>
</body>

</html>
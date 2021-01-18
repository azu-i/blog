<?php
require_once('dbc.php');

$blogData = getAllBlog();

function h($s)
{
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
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
      <a href="/blog/detail.php?id=<?php echo h($archive['id']) ?>">詳細</a>
      <a href="/blog/update_form.php?id=<?php echo h($archive['id']) ?>">編集</a>
      <a href="/blog/blog_delete.php?id=<?php echo h($archive['id']) ?>">削除</a>
      投稿日or更新日：<?php echo h($archive['post_at']) ?>
    <?php endforeach; ?>
    </p>
  </div>
</body>

</html>
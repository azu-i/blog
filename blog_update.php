<?php
require_once('dbc.php');

$blogs = $_POST;



if (empty($blogs['title'])) exit('タイトル入力してください' . "\n");

if (mb_strlen($blogs['title']) > 191) exit('タイトルは191文字以下にしてください' . "\n");
if (empty($blogs['content'])) exit('本文入力してください' . "\n");
if (empty($blogs['category'])) exit('カテゴリーは必須です' . "\n");
if (empty($blogs['public_status'])) exit('公開ステータスは必須です' . "\n");



$sql = 'UPDATE blog SET
         title = :title, content = :content, category = :category, public_status = :public_status
         WHERE
          id = :id' ;

$dbh = dbConnect();
$dbh->beginTransaction();

try {
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':title', $blogs['title'], PDO::PARAM_STR);
  $stmt->bindValue(':content', $blogs['content'], PDO::PARAM_STR);
  $stmt->bindValue(':category', $blogs['category'], PDO::PARAM_INT);
  $stmt->bindValue(':public_status', $blogs['public_status'], PDO::PARAM_INT);
  $stmt->bindValue(':id', $blogs['id'], PDO::PARAM_INT);
  $stmt->execute();
  $dbh->commit();
} catch (PDOException $e) {
  $dbh->rollBack();
  throw new Exception($e);
}
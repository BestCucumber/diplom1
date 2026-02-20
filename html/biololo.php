<?php
session_start();
require_once('../bd.php');

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT name, header_title, star_week FROM bio WHERE id = ?");
$stmt->execute([$id]);
$info = $stmt->fetch();

if (!$info) {
  die("Герой не найден");
}

echo "<h1>" . htmlspecialchars($info['name']) . "</h1>";

if(!empty($info['header_title'])) {
  echo "<p><strong>" . htmlspecialchars($info['header_title']) . "</strong></p>";
}
if(!empty($info['star_week'])) {
  echo "<p>Годы жизни: " . htmlspecialchars($info['star_week']) . "</p>";
}

$stmt = $pdo->prepare("SELECT content_type, content FROM bio_content WHERE bio_id = ? ORDER BY sort_order");
$stmt->execute([$id]);
$sections = $stmt->fetchAll();

if(!empty($sections) && is_array($sections)) {
foreach ($sections as $sec) {
  if($sec['content_type'] == 'title') {
    echo "<h2>" . htmlspecialchars($sec['content']) . "</h2>";
  }elseif($sec['content_type'] === 'text') {
    echo "<p>" . nl2br(htmlspecialchars($sec['content'])) . "</p>";
  }elseif($sec['content_type'] === 'photo') {
    echo "<p>" . nl2br(htmlspecialchars($sec['content'])) . "</p>";
  }
}
}
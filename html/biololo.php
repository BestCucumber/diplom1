<?php
session_start();
require_once('bd.php');

$id = (int)$_GET['id'];

$info = $conn->query("SELECT name, head_ite, star_week FROM bio WHERE id = $id")->fetch_assoc();

echo "<h1>" . htmlspecialchars($info['name']) . "</h1>";

$sections = $conn->query("SELECT content_type, content FROM bio_content WHERE bio_id = $id ORDER BY sort_order");

while ($sec = $sections->fetch_assoc()) {
  if($sec['content_type'] == 'title') {
    echo "<h2>" . htmlspecialchars($sec['content']) . "</h2>";
  }elseif($sec['content_type'] === 'text') {
    echo "<p>" . nl2br(htmlspecialchars($sec['content'])) . "</p>";
  }elseif($sec['content_type'] === 'photo') {
    echo "<p>" . nl2br(htmlspecialchars($sec['content'])) . "</p>";
  }
}
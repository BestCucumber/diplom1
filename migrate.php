<?php
session_start();
require_once('bd.php');

$result = $conn->query("SELECT id, body_title, body_content, photo_1, bode_conj)
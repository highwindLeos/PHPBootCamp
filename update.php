<?php
session_start();

$articleId = filter_input(INPUT_POST, 'article-id', FILTER_SANITIZE_STRING); #수정할 글의 아이디.

$pageTitle = "PHP BootCamp AnInstargram - 수정";

include 'view/updateView.php';
?>
<?php
session_start();
unset($_SESSION);
session_destroy();

header("Location: login.php"); #리다이렉션 페이지 이동
?>
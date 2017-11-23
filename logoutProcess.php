<?php
session_start();
session_destroy(); #세션을 닫는다. (server에서 삭제)

header("Location: login.php"); #리다이렉션 페이지 이동
?>
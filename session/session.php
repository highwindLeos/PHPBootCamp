<?php
session_save_path('./session');
session_start(); #세션을 시작한다. (파일로 저장됨)
$_SESSION['title'] = '세션의 값';
?>
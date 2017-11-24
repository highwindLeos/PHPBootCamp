<?php
apache_setenv("dsn" , "mysql:host=localhost;dbname=anicoboard; charset=utf8");
apache_setenv("dId" , "root");
apache_setenv("dPass" , "stonker26");

$dsn = apache_getenv("dsn");
$dId = apache_getenv("dId");
$dPass = apache_getenv("dPass");

//데이터베이스 접속 설정 (.env 적용)
?>

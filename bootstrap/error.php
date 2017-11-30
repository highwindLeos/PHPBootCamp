<?php
require '../vender/autoload.php'; #composer 로 Autoload

#whoops 예외 처리기 설정.
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
?>
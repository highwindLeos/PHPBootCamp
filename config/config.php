<?php
#데이터베이스 접속 설정 (.env 적용)
require __DIR__ .'/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__); # Dotenv 를 이용한 인스턴스 생성.
$dotenv->load(); # load function call.

#.env 설정에 기술한 값들을 가져와서 변수에 넣는다.
$db_con = getenv('DB_CONNECTION');
$db_host = getenv('DB_HOST');
$db_port = getenv('DB_PORT');
$db_database = getenv('DB_DATABASE');
$db_username = getenv('DB_USERNAME');
$db_password = getenv('DB_PASSWORD');
$db_charset = getenv('DB_CHARSET');

#setting 값으로 설정한 DB 접속 정보. PDO 에 이용됨.
$dsn = $db_con.':host='.$db_host.';dbname='.$db_database.';'.$db_charset;
$dId = $db_username;
$dPass = $db_password;
?>
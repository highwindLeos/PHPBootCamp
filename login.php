<?php

require 'config/config.php';

$db = new PDO($dsn, $dId, $dPass);

    include 'model/loginModel.php'; #모델 클래스를 사용할 수 있게 포함시킨다.

$Model = new loginModel($db);# 인스턴스를 만듭니다.
$list = $Model->getAlls(); # 리스트를 가져오는 model class에 함수getAlls() 를 호출해서 $list 변수에 담습니다.

?>

<?php include 'view/loginView.php'; # 뷰를 가져온다. ?>
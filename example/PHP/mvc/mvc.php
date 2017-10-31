<?php
$db = new PDO('mysql:host=localhost;dbname=anicoboard; charset=utf8', 'root', 'stonker26');

// 모델 클래스를 사용할 수 있게 포함시킨다.
include 'model.php';

// 인스턴스를 만듭니다.
$Model = new Model($db);
// Foo의 리스트를 가져옵니다.
$List = $fooModel->getAlls();

// 뷰를 보여준다.
include 'list.php';
?>
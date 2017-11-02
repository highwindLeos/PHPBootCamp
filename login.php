<?php
$db = new PDO('mysql:host=localhost;dbname=anicoboard; charset=utf8', 'root', 'stonker26');

    include './model/model.php'; #모델 클래스를 사용할 수 있게 포함시킨다.

$Model = new Model($db);# 인스턴스를 만듭니다.
$list = $Model->getAlls(); # 리스트를 가져옵니다.

?>

<?php include './view/loginView.php'; # 뷰를 가져온다. ?>
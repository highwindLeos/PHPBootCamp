<?php

require 'config/config.php';
$db = new PDO($dsn, $dId, $dPass);

include 'model/Model.php'; #모델 클래스를 사용할 수 있게 포함시킨다.
$model = new Model($db);# 인스턴스를 만듭니다.
$articles = $model->getArticles(); # 리스트를 가져오는 model class에 함수getAlls() 를 호출해서 $articles 변수에 담습니다.

//echo '<pre>';
//    print_r($articles);
//echo '</pre>';
#데이터 베이스 에 article내용의 articleId를 참고로 pictuerstable에 사진의경로 컬럼을 가지고온다.
for($i=0; $i < count($articles); $i++) {
    
    $pictures = $model->getPictures($articles[$i]['id']);
    $articles[$i]['src'] = $pictures;
     
}

echo '<pre style="margin-top=200px;">';
    print_r($articles);
echo '</pre>';

include 'view/loginView.php'; # 뷰를 가져온다.

?>
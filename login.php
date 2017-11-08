<?php

require 'config/config.php';
$db = new PDO($dsn, $dId, $dPass);

include 'model/Model.php'; #모델 클래스를 사용할 수 있게 포함시킨다.
$model = new Model($db);# 인스턴스를 만듭니다.
$articles = $model->getArticles(); # 리스트를 가져오는 model class에 함수getAlls() 를 호출해서 $articles 변수에 담습니다.
$users = $model->getUsers(); # 리스트를 가져오는 model class에 함수getAlls() 를 호출해서 $articles 변수에 담습니다.

for($i=0; $i < count($articles); $i++) { # $articles 의 수를 가져온다.(정수형 반환)
    
    #사용자 아이콘 : 데이터 베이스에 user내용의 Id를 참고로 usericon 컬럼을 가져온다.
    $usericon = $model->getUserIcons($articles[$i]['id']);
    $articles[$i]['usericon'] = $usericon;
    
    #메인 사진 : 데이터 베이스 에 article내용의 Id를 참고로 pictures table에 src 컬럼을 가지고온다.
    $pictures = $model->getPictures($articles[$i]['id']);
    $articles[$i]['src'] = $pictures;
       
}
echo '<pre style="margin-top: 100px;">';
    print_r($articles);
echo '</pre>';
include 'view/loginView.php'; # 뷰를 가져온다.

?>
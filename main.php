<?php
session_start();
require 'config/config.php';
include 'model/articleModel.php'; #모델 클래스를 사용할 수 있게 포함시킨다.

try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        echo $e->getMessage();
    }

$articlemodel = new articleModel($db);# 인스턴스를 만듭니다.
$articles = $articlemodel->getArticles(); 
$users = $articlemodel->getUsers(); 

$email = $_SESSION['email'];

for($i=0; $i < count($articles); $i++) { # $articles 의 수만큼 반복한다.(정수형 반환)
    
    #사용자 아이콘 + 사용자 별명: 데이터 베이스에 users내용의 users_id를 참고로 usericon + Author 컬럼을 가져온다.
    $articles[$i]['usericon'] = $articlemodel->getUserIcons($articles[$i]['users_id']);
    
    #메인 사진 : 데이터 베이스에 articles내용을 Id를 참고로 pictures table에 모든 컬럼을 가지고온다.
    $articles[$i]['src'] = $articlemodel->getPictures($articles[$i]['id']);
    
    #코멘트 갯수 : 데이터 베이스에 articles 내용의 Id를 참고로 코멘트 컬럼을 가지고온다.
    $articles[$i]['comments'] = $articlemodel->getComments($articles[$i]['id']);
    
    #좋아요 갯수 : 데이터 베이스에 articles 내용의 Id를 참고로 likes table에 like 컬럼을 가지고온다.
    $articles[$i]['like'] = $articlemodel->getLikeCnt($articles[$i]['id']);
        
}
    
include 'view/mainView.php'; # 뷰를 가져온다.

?>
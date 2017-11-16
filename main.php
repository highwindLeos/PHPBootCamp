<?php
session_start();
require 'config/config.php';

try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        echo $e->getMessage();
    }

include 'model/articleModel.php'; #모델 클래스를 사용할 수 있게 포함시킨다.
$articlemodel = new articleModel($db);# 인스턴스를 만듭니다.
$articles = $articlemodel->getArticles(); 
$users = $articlemodel->getUsers(); 
//
//echo '<pre style=margin-top:150px>';
//var_dump($articles);
//echo '</br>';
//var_dump($users);
//echo '</pre>';
//exit();

$email = $_SESSION['email'];

for($i=0; $i < count($articles); $i++) { # $articles 의 수만큼 반복한다.(정수형 반환)
    
    #사용자 아이콘 + 사용자 별명: 데이터 베이스에 users내용의 users_id를 참고로 usericon + Author 컬럼을 가져온다.
    $usericons = $articlemodel->getUserIcons($articles[$i]['users_id']);
    $articles[$i]['usericon'] = $usericons;
    
    #메인 사진 : 데이터 베이스에 articles내용을 Id를 참고로 pictures table에 src 컬럼을 가지고온다.
    $pictures = $articlemodel->getPictures($articles[$i]['users_id']);
    $articles[$i]['src'] = $pictures;
    
    #좋아요 갯수 : 데이터 베이스에 articles 내용의 Id를 참고로 likes table에 like 컬럼을 가지고온다.
    $likes = $articlemodel->getLikeCnt($articles[$i]['id']);
    $articles[$i]['like'] = $likes;
    
    #코멘트 갯수 : 데이터 베이스에 articles 내용의 Id를 참고로 코멘트 컬럼을 가지고온다.
    $comments = $articlemodel->getComments($articles[$i]['users_id']);
    $articles[$i]['comments'] = $comments;

}

include 'view/mainView.php'; # 뷰를 가져온다.

?>
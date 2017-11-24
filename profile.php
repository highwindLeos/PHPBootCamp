<?php
session_start();
require 'model/profileModel.php'; #모델 클래스를 사용할 수 있게 포함시킨다.
require 'config/config.php';

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }

    $author = filter_var($_GET['author'], FILTER_SANITIZE_STRING); # ㅍfilter_var 와 filter_input 의 차이점 과 필터의 종류의 대하여 학습
    $loginer = filter_var($_SESSION['author'], FILTER_SANITIZE_STRING);

    $profilemodel = new profileModel($db);
    $followProfile = $profilemodel->getFollowingsByAuthor($author);

    if(!empty($author)) { #  .
    
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByAuthor($author);
        $pitures = $profilemodel->getPictureByAuthor($author);
        $followings = $profilemodel->getFollowingsByAuthor($author);
        $followers = $profilemodel->getFollowersByAuthor($author);
        
    } else {
           
    }#방어적 프로그래밍(Defensive Programming)

include 'view/profileView.php';
?>
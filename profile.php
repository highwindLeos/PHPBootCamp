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
    # filter_var 와 filter_input 의 차이점 과 필터의 종류의 대하여 학습
    $author = filter_input(INPUT_GET, 'author', FILTER_SANITIZE_STRING); 
    $loginer = $_SESSION['author'];

    $profilemodel = new profileModel($db);
    $followProfile = $profilemodel->getFollowingsByAuthor($author);

    if(!empty($author)) { # 쿼리스트링으로 사용자가 접근했다면. 
    
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByAuthor($author);
        $pitures = $profilemodel->getPictureByAuthor($author);
        $followings = $profilemodel->getFollowingsByAuthor($author);
        $followers = $profilemodel->getFollowersByAuthor($author);
        
    } else {
        header("Location: profile.php?author=$loginer"); #리다이렉션 페이지 이동   
    } #방어적 프로그래밍(Defensive Programming)

include 'view/profileView.php';
?>
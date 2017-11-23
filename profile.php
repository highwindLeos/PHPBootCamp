<?php
    session_start();
    include 'model/profileModel.php'; #모델 클래스를 사용할 수 있게 포함시킨다.
    require 'config/config.php';

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }

    $author = filter_var($_GET['author'], FILTER_DEFAULT);
    $loginer = filter_var($_SESSION['author'], FILTER_DEFAULT);

    $profilemodel = new profileModel($db);
    $followProfile = $profilemodel->getFollowingsByAuthor($author);

    if($_GET['author']) { # 프로필페이지.
    
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByAuthor($author);
        $pitures = $profilemodel->getPictureByAuthor($author);
        $followings = $profilemodel->getFollowingsByAuthor($author);
        $followers = $profilemodel->getFollowersByAuthor($author);
        
    }

    include 'view/profileView.php';
?>
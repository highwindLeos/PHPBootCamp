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
    $followProfile = $profilemodel->getFollowsByAuthor($author);


    if($_GET['author']) { # 타인의 프로필페이지.
    
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByAuthor($author);
        $pitures = $profilemodel->getPictureByAuthor($author);
        $followrs = $profilemodel->getFollowsByAuthor($author);
        $follow = $profilemodel->getFollowsByAuthor($loginer);
        $follow = $profilemodel->getFollowersByAuthor($author);
        
    } else if($_SESSION['author']) { # 로그인 한 사용자의 프로필페이지.
        
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByEmail($loginer);
        $pitures = $profilemodel->getPictureByEmail($loginer);
        $followrs = $profilemodel->getFollowsByAuthor($loginer);
    } 

    include 'view/profileView.php';
?>
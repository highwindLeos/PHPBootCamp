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

    include 'model/profileModel.php'; #모델 클래스를 사용할 수 있게 포함시킨다.

    $author = $_GET['author'];
    $loginer = $_SESSION['author'];
    
    if($_GET['author']){
    
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByAuthor($author);
        $pitures = $profilemodel->getPictureByAuthor($author);

    } else if($_SESSION['author']){
        
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByEmail($loginer);
        $pitures = $profilemodel->getPictureByEmail($loginer);

    }

    include 'view/followingView.php';
?>
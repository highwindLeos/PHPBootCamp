<?php
    session_start();
    include 'model/profileModel.php'; #모델 클래스를 사용할 수 있게 포함시킨다.
    include 'model/deleteModel.php'; 
    require 'config/config.php';

    try {
            $db = new PDO($dsn, $dId, $dPass);
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }

    $author = $_GET['author'];
    $loginer = $_SESSION['author'];
    $loginerId = $_SESSION['id'];

    if($_GET['author']) {
    
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByAuthor($author);
        $pitures = $profilemodel->getPictureByAuthor($author);

    } else if($_SESSION['author']) {
        
        $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
        $list = $profilemodel->getUserIconByEmail($loginer);
        $pitures = $profilemodel->getPictureByEmail($loginer);

    } 

    if(!empty($_POST['unfollow'])) { #unfollow button click. POST Array in value. (값이 있다면. true)

        $followUser = $_POST['followUser'];
        $usersId = $_SESSION['id'];
        
        $deleteModel = new deleteModel($db);# 인스턴스를 만듭니다.
        $deleteModel->DeleteFollowsByUsersId($followUser,$usersId);
    }

    include 'view/profileView.php';
?>
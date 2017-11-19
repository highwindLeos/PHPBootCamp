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
    $email = $_SESSION['email'];
    
    if($_GET['author']){
        
    $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
    $list = $profilemodel->getUserIconByAuthor($author);
    $pitures = $profilemodel->getPictureByAuthor($author);
        
    } else if($_SESSION['email']){
        
    $profilemodel = new profileModel($db);# 인스턴스를 만듭니다.
    $list = $profilemodel->getUserIconByEmail($email);
    $pitures = $profilemodel->getPictureByEmail($email);
        
    }

    include 'view/profileView.php';
?>
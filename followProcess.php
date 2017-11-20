<?php
    session_start();
    require 'model/insertModel.php'; 
    require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }
    
    $author = filter_var($_GET['author'], FILTER_DEFAULT); #FILE 배열을 필터링.
//    $follow = $_POST['follow'];  #buttuon default value.

    $insertmodel = new InsertModel($db);

    if(!empty($author)){ # $author 가 빈값이 아니라면 True.
        $insertmodel->WriteFollows(); #follower 를 업로드.

        $author = "following.php?author=".$_GET['author'];
        header("Location: $author");
    }   
?>
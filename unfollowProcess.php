<?php
session_start();
require 'model/deleteModel.php'; 
require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }
    
    $followUser = filter_input(INPUT_POST, 'followUser', FILTER_SANITIZE_STRING); #hidden value.
    $loginerid =  filter_var($_SESSION['id'], FILTER_SANITIZE_STRING);
    $author = filter_var($_GET['author'], FILTER_SANITIZE_STRING); #페이지 사용자.
    $unfollow = filter_input(INPUT_POST, 'unfollow', FILTER_SANITIZE_STRING); #buttuon default value.

    $deletemodel = new deleteModel($db);

    if(!empty($author)){ # $author 가 빈값이 아니라면 True.
        $deletemodel->DeleteFollowsByUsersId($followUser,$loginerid); #follower 삭제한다.

        $author = "profile.php?author=".$_GET['author']; #$_GET 쿼리스트링 경로.
        header("Location: $author");
    }   

?>
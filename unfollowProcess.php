<?php
session_start();
require __DIR__.'/vendor/autoload.php';

use DatabaseModel\DeleteModel; #네임스페이스에  Class 를 사용한다.

require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }

    $deletemodel = new DeleteModel($db);    
    
    $followUser = filter_input(INPUT_POST, 'followUser', FILTER_SANITIZE_STRING); #hidden value.
    $loginerid =  filter_var($_SESSION['id'], FILTER_SANITIZE_STRING); #로그인 사용자의 Table ID.
    $author = filter_input(INPUT_GET, 'author', FILTER_SANITIZE_STRING); #페이지 사용자.
    $unfollow = filter_input(INPUT_POST, 'unfollow', FILTER_SANITIZE_STRING); #buttuon default value.

    if(!empty($author)){ # $author 가 빈값이 아니라면 True.
        $deletemodel->DeleteFollowsByUsersId($followUser,$loginerid); #follower 삭제한다.

        $redirection = "profile.php?author=".$_GET['author']; #$_GET 쿼리스트링 경로.
        header("Location: $redirection");
    }   

?>
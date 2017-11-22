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
    $follow = filter_input(INPUT_POST, 'follow', FILTER_DEFAULT); #buttuon default value.

    $insertmodel = new InsertModel($db);

    if(!empty($author)){ # $author 가 빈값이 아니라면 True.
        $insertmodel->WriteFollows(); #follower 를 DB에 쓴다.

        $author = "profile.php?author=".$_GET['author']; #$_GET 쿼리스트링 경로.
        header("Location: $author");
    }   

?>
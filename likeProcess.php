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
    
    $author = filter_input(INPUT_GET, 'author', FILTER_SANITIZE_STRING);
    $like = filter_input(INPUT_POST, 'like', FILTER_SANITIZE_STRING); #buttuon default value.

    $insertmodel = new InsertModel($db);

    if(!empty($author)){ # $author 가 빈값이 아니라면 True.
        $insertmodel->WriteLikes(); #Like 를 DB에 쓴다.

        $Redirection = "main.php"; #$_GET 쿼리스트링 경로.
        header("Location: $Redirection");
    }   

?>
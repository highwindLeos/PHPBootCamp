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
    
    $articleid = filter_input(INPUT_POST, 'likeid', FILTER_SANITIZE_STRING); #hidden value.
    $loginerid =  filter_var($_SESSION['id'], FILTER_SANITIZE_STRING);
    $unlike = filter_input(INPUT_POST, 'unlike', FILTER_SANITIZE_STRING); #buttuon default value.

    $deletemodel = new deleteModel($db);

    if(!empty($unlike)){ # $unlike 가 빈값이 아니라면 True.
        $deletemodel->DeleteLikesByUsersId($loginerid, $articleid); #follower 삭제한다.

        $redirection = "main.php"; 
        header("Location: $redirection");
    }   

?>
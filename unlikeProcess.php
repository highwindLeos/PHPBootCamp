<?php
session_start();
require 'vendor\autoload.php';

use DatabaseModel\deleteModel; #네임스페이스에  Class 를 사용한다.

require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }
    
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
    $articleid = filter_input(INPUT_POST, 'likeid', FILTER_SANITIZE_STRING); #hidden value.
    $loginerid =  filter_var($_SESSION['id'], FILTER_SANITIZE_STRING);
    $unlike = filter_input(INPUT_POST, 'unlike', FILTER_SANITIZE_STRING); #buttuon default value.

    $deletemodel = new deleteModel($db);

    if(!empty($unlike)){ # $unlike 가 빈값이 아니라면 True.
        $deletemodel->DeleteLikesByUsersId($loginerid, $articleid); #Likes 삭제한다.

        $redirection = "main.php?page=".$page; 
        header("Location: $redirection");
    }   

?>
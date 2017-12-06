<?php
session_start();
require 'vendor\autoload.php';

use DatabaseModel\InsertModel; #네임스페이스에  Class 를 사용한다.

require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }
    
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING); # 현제 페이지의 값.
    $like = filter_input(INPUT_POST, 'like', FILTER_SANITIZE_STRING); #buttuon default value.

    $insertmodel = new InsertModel($db);

    if(!empty($like)){ # $page 가 빈값이 아니라면 True.
        $insertmodel->WriteLikes(); #Like 를 DB에 쓴다.

        $Redirection = "main.php?page=".$page; #$_GET 쿼리스트링 경로.
        header("Location: $Redirection");
    }   

?>
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
    
    $articleId = filter_input(INPUT_POST, 'article-id', FILTER_SANITIZE_STRING); #hidden value.
    $author = filter_var($_GET['author'], FILTER_SANITIZE_STRING); #페이지 사용자.

    $deletemodel = new deleteModel($db);

    if(!empty($author)){ # $author 가 빈값이 아니라면 True.
        $deletemodel->DeleteArticlesById($articleId); #article을 $articleId 를 입력받아 삭제한다.

        $redirection = "main.php"; 
        header("Location: $redirection");
    }   

?>
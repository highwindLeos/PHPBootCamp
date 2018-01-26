<?php
session_start();
require __DIR__.'/vendor/autoload.php';

use DatabaseModel\ArticleModel; 

require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }
    
    $articlemodel = new ArticleModel($db);

    $articleId = filter_input(INPUT_POST, 'article-id', FILTER_SANITIZE_STRING); #수정할 글의 아이디.

    if(!empty($articleId)) { 
        $_SESSION['modifyarticle'] = $articlemodel->getArticlesById($articleId);
        $_SESSION['modifypicture'] = $articlemodel->getPictures($articleId);
    }

$pageTitle = "PHP BootCamp AnInstargram - ".basename(__FILE__, '.php');

include 'view/updateView.php';
?>
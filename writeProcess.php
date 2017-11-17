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

    $insertmodle = new InsertModel($db);
    $insertmodle->UploadImageAndArticleId(); #사진을 업로드.
    $insertmodle->UploadArticles(); #내용을 업로드.
    
    header("Location: main.php"); #리다이렉션 페이지 이동

?>
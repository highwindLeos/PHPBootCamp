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

    if(!$_GET['name']){ # Cancle 버튼이 아니라면 True.
        if($_FILES['image_uploads']['name']){ # 업로드 사진이 없다면.
            $insertmodle->UploadImageAndArticleId(); #사진을 업로드.
            $insertmodle->WriteArticles(); #내용을 업로드.
            header("Location: main.php");
        } else {
            header("Location: main.php");
        }
    }

?>
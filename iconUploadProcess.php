<?php
session_start();
require 'model/updateModel.php'; 
require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }
    
    $iconImage = filter_var($_FILES['icon_uploads']['name'], FILTER_SANITIZE_STRING); #FILE 배열을 필터링.
    $author = trim($_SESSION['author']);

    $location = 'profile.php?author='.$author; #리다이렉션 변수

    $updateModel = new UpdateModel($db);
    
    if(!empty($iconImage)){ # 업로드 사진이 있다면  true.
        $updateModel->UsersIconUpload(); #사진을 업로드.
        header("Location: $location");
    } else {
        header("Location: main.php");
    } 
    
?>
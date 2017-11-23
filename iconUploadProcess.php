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
    
    $picture = filter_var($_FILES['icon_uploads']['name'], FILTER_DEFAULT); #FILE 배열을 필터링.
    $author = trim($_SESSION['author']);
    $location = 'profile.php?author='.$author;

    $updateModel = new UpdateModel($db);
    

    if(!empty($picture)){ # 업로드 사진이 있다면  true.
        $updateModel->UsersIconUpload(); #사진을 업로드.
        header("Location: $location");
    } else {
        header("Location: main.php");
    } 
    
?>
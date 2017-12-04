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
    
    $updateModel = new UpdateModel($db);

    $uploder= filter_input(INPUT_GET, 'author', FILTER_SANITIZE_STRING); 
    $iconImage = filter_var($_FILES['icon_uploads']['name'], FILTER_SANITIZE_STRING); #FILE 배열을 필터링.
    $author = trim($_SESSION['author']);

    $redirection = 'profile.php?author='.$author; #리다이렉션 변수

    if($uploder == $author){
        if(!empty($iconImage)){ # 업로드 사진이 있다면  true.
            $updateModel->UsersIconUpload(); #사진을 업로드.
            header("Location: $redirection");
        } 
    } else {
        header("Location: $redirection");
    } 
    
?>
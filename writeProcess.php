<?php
session_start();
require __DIR__.'/vendor/autoload.php';

use DatabaseModel\InsertModel; #네임스페이스에  Class 를 사용한다.
use DatabaseModel\ArticleModel; #네임스페이스에  Class 를 사용한다.

require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }
    
    $insertmodel = new InsertModel($db);
    $articlemodel = new ArticleModel($db);

    $name = filter_var($_GET['name'], FILTER_SANITIZE_STRING); #$_GET 배열을 필터링.
    $picture = $_FILES['image_uploads']['name']; #FILE 배열은 필터링을 하지 않는다.
    $article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING); # article 입력을 필터링.
    
    if(isset($_POST)){ #POST에 값이 있다면 검증을 실행.
        # Variable Setting
        $errors = array(); #Error message in array creating.

        # Validation Code
        if(empty($article)) #Variable Empty. 값이 없다면 true.
        {
            $_SESSION['article'] = $errors['article'] = "* 내용은 빈칸일 수 없습니다.";
        }
        
        if(empty($picture))
        {
            $_SESSION['picture'] = $errors['picture'] = "* 업로드 할 사진을 선택하지 않았습니다.";
        }  
    }

    if(count($errors) == 0){ 
        # 에러가 없다면 True.
        $insertmodel->WriteArticles($article); #내용을 업로드.
        $maxid = $articlemodel->getArticlesMaxId(); # 현제 업로드된 articles의 Id 값을 배열로 가져옴
        $insertmodel->UploadImageAndArticleId($maxid[0][0]); #사진을 업로드.
        header("Location: main.php");
    } else {
        header("Location: write.php");
    }

    if($name == 'cancle'){ # Cancle 버튼이 눌려서 Query String 값이 있다면 True.
        $_SESSION['article'] = $_SESSION['picture'] = ''; #세션에 검증 메세지만 삭제 후 페이지 이동.
        header("Location: main.php");
    }
    
?>
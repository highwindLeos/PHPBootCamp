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
    
    $article = filter_input(INPUT_POST, 'article', FILTER_DEFAULT); 
    $picture = filter_var($_FILES['image_uploads']['name'], FILTER_DEFAULT); #FILE 배열을 필터.
    
    $insertmodle = new InsertModel($db);
    
    if($_POST){ #POST에 값이 있다면 검증을 실행.
        # 변수설정
        $errors = array(); #에러 메세지를 담을 배열을 생성

        # 검증 코드
        if(empty($article))
        {
            $_SESSION['article'] = $errors['article'] = "* 내용은 빈칸일 수 없습니다.";
        }
        
        if(empty($picture))
        {
            $_SESSION['picture'] = $errors['picture'] = "* 업로드 할 사진을 선택하지 않았습니다.";
        }  
    }

    if(!$_GET['name']){ # Cancle 버튼이 아니라면 True.
        if(count($errors) == 0 && $_FILES['image_uploads']['name']){ # 업로드 사진이 없다면.
            $insertmodle->UploadImageAndArticleId(); #사진을 업로드.
            $insertmodle->WriteArticles(); #내용을 업로드.
            header("Location: main.php");
        } else {
            header("Location: write.php");
        }
    }
    
    if($_GET['name']){ # Cancle 버튼이 눌려서 값이 있다면 True.
        $_SESSION['article'] = $_SESSION['picture'] = ''; #세션에 검증 메세지만 삭제 후 페이지 이동.
        header("Location: main.php");
    }
    
?>
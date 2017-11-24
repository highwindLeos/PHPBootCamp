<?php
session_start();
require 'model/articleModel.php'; 
require 'model/insertModel.php'; 
require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }
    
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING); # comment 입력을 필터링.

    $insertmodel = new InsertModel($db);
    $articlemodel = new articleModel($db);
    $articles = $articlemodel->getArticles();  

    for($i=0; $i < count($articles); $i++) { # $articles 의 수만큼 반복한다.(정수형 반환)
    
    #데이터 베이스에 articles내용을 Id를 참고로 pictures table에 모든 행을 가지고온다.
    $_SESSION[$i]['articles_id'] = $articlemodel->getPictures($articles[$i]['id']);        

    }
    
    if($_POST){ #POST에 값이 있다면 검증을 실행.
        # 변수설정
        $errors = array(); #에러 메세지를 담을 배열을 생성

        # 검증 코드
        if(empty($comment)) #변수에 값이 없다면 true.
        {
            $_SESSION['comment'] = $errors['comment'] = "댓글의 내용을 입력해 주세요.";
        }
    }
    
    if(count($errors) == 0){ # 검증 error이 없다면 True. 
        $insertmodel->WriteComments($comment); #내용을 업로드.
        header("Location: main.php");
    } else {
        header("Location: main.php");
    }

?>
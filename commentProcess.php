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
    
    $comment = filter_input(INPUT_POST, 'comment', FILTER_DEFAULT); # comment 입력을 필터링.

    $insertmodel = new InsertModel($db);
    

    if($_POST){ #POST에 값이 있다면 검증을 실행.
        # 변수설정
        $errors = array(); #에러 메세지를 담을 배열을 생성

        # 검증 코드
        if(empty($comment)) {#변수에 값이 없다면 true.
            $_SESSION['comment'] = $errors['comment'] = $alert = "댓글의 내용을 입력해 주세요.";
        }
    }
    
    if(count($errors) == 0){ # 검증 error이 없다면 True. 
        $insertmodel->WriteComments(); #함수 호출.
        header("Location: main.php");
    } else {
        header("Location: main.php");
    }
    
?>
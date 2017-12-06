<?php
session_start();
require 'vendor\autoload.php';

use DatabaseModel\articleModel; #네임스페이스에  Class 를 사용한다.
use DatabaseModel\insertModel; #네임스페이스에  Class 를 사용한다.

require 'config/config.php';

    try {
        $db = new PDO($dsn, $dId, $dPass);
    }
    catch(PDOException $e) 
    {
        die($e->getMessage());
    }
    
    $insertmodel = new InsertModel($db);
    $articlemodel = new articleModel($db);

    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING); # comment 입력을 필터링.
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);   

    $article = $articlemodel->getArticlesCount(); #행의 갯수를 구하는 함수.
    
        $pageGet = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING); 
        $page = ($pageGet) ? $pageGet : 1; #삼항 연산자를 통한 if 문. (페이지 값이 없을경우 기본 값은 1 false).
    
        $articlecount = $article[0][0]; #Article 의 행 의 수를 구한다.
    
        $pageList = 10; #한 페이지에 표시할 게시물 수 (LIMIT 의 입력값으로 들어감)
        $pageBlock = 3; #블록의 수 (각 페이지의 링크가 됨)
    
        $pageNum = ceil($articlecount / $pageList); # 총 페이지 수 (반올림 함수 이용 소수점을 올림한다.)
        $blockNum = ceil($pageNum / $pageBlock); # 총 블록
        $nowBlock = ceil($page / $pageBlock); # 현제 블록
    
        $Startpage = ($nowBlock * $pageBlock) - ($pageBlock - 1); #시작 페이지.
        if ($Startpage <= 1) { # 시작 페이지가 1보다 작아지면 안되기 때문에 Startpage는 항상 1 이하일경우 1로 고정.
            $Startpage = 1; 
        }
    
        $Endpage = $nowBlock * $pageBlock; #종료 페이지. 현제 블록 * 페이지 블럭
        if ($pageNum <= $Endpage) { # 종료 페이지의 수가 페이지 수보다 커지면 종료페이지는 페이지수로 고정.
            $Endpage = $pageNum;
        }
        
        $Selectpoint = ($page - 1) * $pageList;

    $usersId = $_SESSION['id']; #로그인한 사용자의 Id.

    $articles = $articlemodel->getArticles($Selectpoint, $pageList, $usersId);  # articles 의 내용을 LIMIT 해서 가져온다.
    for($i = 0; $i < count($articles); $i++) { # $articles 의 수만큼 반복한다.(정수형 반환)
    
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

        $Redirection = "main.php?page=".$page; #$_GET 쿼리스트링 경로.
        header("Location: $Redirection");
    } else {
        header("Location: main.php");
    }

?>